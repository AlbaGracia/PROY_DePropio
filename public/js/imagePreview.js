export function showImage(preview, inputSelector) {
    const imagePrev = document.querySelector(preview);
    const input = document.querySelector(inputSelector);

    if (input && imagePrev) {
        input.addEventListener("change", (e) => {
            let file = e.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = (event) => {
                    imagePrev.src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }
}