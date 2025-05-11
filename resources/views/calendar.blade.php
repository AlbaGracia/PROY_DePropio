@extends('layouts.master')

@section('content')
    <div class="container d-flex justify-content-center my-5">
        <div class="row w-100 justify-content-center align-items-center gap-4">
            <!-- CALENDARIO -->
            <div class="col-md-6 col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    {{-- Mes anterior --}}
                    <button onclick="changeMonth(-1)" class="btn btn-link-secondary"><i
                            class="fa-solid fa-arrow-left"></i></button>
                    <h2 id="calendar-title" class="h4 fw-bold m-0">{{ __('labels.month') }}</h2>
                    {{-- Mes siguiente --}}
                    <button onclick="changeMonth(1)" class="btn btn-link-secondary"><i
                            class="fa-solid fa-arrow-right"></i></button>
                </div>
                <table class="table text-center">
                    <thead class="table-light">
                        <tr>
                            <th>{{ __('labels.lu') }}</th>
                            <th>{{ __('labels.ma') }}</th>
                            <th>{{ __('labels.mi') }}</th>
                            <th>{{ __('labels.ju') }}</th>
                            <th>{{ __('labels.vi') }}</th>
                            <th>{{ __('labels.sa') }}</th>
                            <th>{{ __('labels.do') }}</th>
                        </tr>
                    </thead>
                    <tbody id="calendar-body"></tbody>
                </table>
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
        let currentMonth = new Date().getMonth(); //Obtenemos el mes actual
        let currentYear = new Date().getFullYear(); //Obtenemos el año actual

        //En cuanto se carga el dom se crea el calendario
        document.addEventListener("DOMContentLoaded", () => {
            loadCalendar(currentYear, currentMonth);
        });

        //Cambia de mes al clicar en botones / flechas
        function changeMonth(num) {
            currentMonth += num;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            loadCalendar(currentYear, currentMonth);
        }

        //Cargar calendario
        async function loadCalendar(year, month) {
            const currentLanguage = '{{ LaravelLocalization::getCurrentLocale() }}'
            const title = new Date(year, month).toLocaleString(currentLanguage, {
                month: 'long', //Enero, Febrero, Marzo,......
                year: 'numeric' //20xx
            });
            //Poner en mayuscula la primera letra + el titulo sin la primera letra
            document.getElementById('calendar-title').innerText = title.charAt(0).toUpperCase() + title.slice(1);

            try {
                const result = await fetch(`/calendar/events/${year}/${month + 1}`);
                const events = await result.json();
                renderCalendar(year, month, events);
            } catch (error) {
                const errorMessage = "{{ __('labels.err-load-cal') }}";
                console.error(errorMessage);
            }
        }


        function renderCalendar(year, month, events) {
            //Obtener el primer dia del mes y le resta uno para que el calendario empieze en lunes no en domingo
            let firstDay = new Date(year, month, 1).getDay();
            firstDay = (firstDay === 0) ? 6 : firstDay - 1;

            //Número de dias del mes
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            const calendarBody = document.getElementById('calendar-body');
            calendarBody.innerHTML = '';

            let row = document.createElement('tr');
            for (let i = 0; i < firstDay; i++) {
                row.innerHTML += '<td></td>';
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const fullDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                const td = document.createElement('td');
                td.innerText = day;
                td.classList.add('cursor-pointer', 'hover:bg-gray-200', 'p-3');
                td.onclick = () => loadEventsForDate(fullDate);

                row.appendChild(td);
                //Crear una nueva fila si se acaba la semana o el mes
                if ((firstDay + day) % 7 === 0 || day === daysInMonth) {
                    calendarBody.appendChild(row);
                    row = document.createElement('tr');
                }
            }
        }

        async function loadEventsForDate(date) {
            let daySelect = document.getElementById('selected-date')
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
                <a href="/event/${e.id}">
                    <div class="font-bold">
                        <i class="fa-regular fa-circle-dot text-royal-purple"></i> ${e.name}
                        <br/>
                        <p class="badge bg-lime-yellow text-dark align-self-start">${e.category.name}</p>
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
    </script>
@endpush
