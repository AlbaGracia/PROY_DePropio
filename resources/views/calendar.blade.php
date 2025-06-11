@section('title', __('labels.calendar'))
@extends('layouts.master')

@section('content')
    <div class="container d-flex justify-content-center my-5">
        <div class="row w-100 justify-content-center align-items-center gap-4">
            <!-- CALENDARIO -->
            <div class="col-md-6 col-12" id="calendar">
            </div>

            <!-- EVENTOS -->
            <div class="col-md-5 col-12">
                <div class="bg-light p-3 rounded shadow-sm" style="height: 500px; overflow-y: auto;">
                    <h3 class="h5 fw-bold mb-3 zen-dots">{{ __('labels.day-events') }} <span id="selected-date"
                            class="fw-bold zen-dots text-royal-purple"></span></h3>
                    <ul id="event-list" class="list-unstyled"></ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            let selectedDayEl = null;
            let selectedDateStr = null;

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                firstDay: 1,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                },
                buttonText: {
                    today: 'Hoy'
                },
                events: '/calendar/events/' + new Date().getFullYear() + '/' + (new Date().getMonth() + 1),
                dateClick: function(info) {
                    if (selectedDateStr === info.dateStr) {
                        selectedDayEl.classList.remove('selected-day');
                        selectedDayEl = null;
                        selectedDateStr = null;
                        document.getElementById('selected-date').innerText = '';
                        document.getElementById('event-list').innerHTML = '';
                    } else {
                        if (selectedDayEl) {
                            selectedDayEl.classList.remove('selected-day');
                        }
                        selectedDayEl = info.dayEl;
                        selectedDayEl.classList.add('selected-day');
                        selectedDateStr = info.dateStr;
                        loadEventsForDate(info.dateStr);
                    }
                },
                eventClick: function(info) {
                    window.open('/event/' + info.event.id, '_blank');
                }
            });

            calendar.render();

            async function loadEventsForDate(date) {
                const daySelect = document.getElementById('selected-date');
                daySelect.innerText = date.split('-').reverse().join('-');

                try {
                    const res = await fetch(`/calendar/day/${date}`);
                    const events = await res.json();

                    const list = document.getElementById('event-list');
                    list.innerHTML = '';

                    if (events.length === 0) {
                        const noEvents = "{{ __('labels.no-events') }}";
                        list.innerHTML = `<li>${noEvents}</li>`;
                        return;
                    }

                    events.forEach(e => {
                        const li = document.createElement('li');
                        li.classList.add('my-2', 'p-2', 'bg-white', 'rounded');
                        li.innerHTML = `
                    <a href="/event/${e.id}" target="_blank">
                        <div class="font-bold">
                            <i class="fa-regular fa-circle-dot text-royal-purple"></i> ${e.name}
                            <br />
                            <span class="badge bg-lime-yellow text-dark align-self-start">${e.category?.name || ''}</span>
                        </div>
                    </a>
                `;
                        list.appendChild(li);
                    });
                } catch (error) {
                    console.error("Error cargando eventos del día:", error);
                    document.getElementById('event-list').innerHTML = '<li>Error al cargar eventos.</li>';
                }
            }
        });
    </script>
@endpush
