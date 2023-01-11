@section('scriptUser')
    <script>
        let imgs = document.querySelectorAll('.user');
        imgs.forEach((c) => {
            let fileUser = document.getElementById(`image_${c.id.split('usr_img_')[1]}`);
            let iconUser = document.getElementById(`icon`);

            c.addEventListener('click', () => {
                fileUser.click()
            })

            fileUser.addEventListener('change', (event) => {

                iconUser.classList.add('text-[#c4c4c4]')
                let reader = new FileReader();

                reader.onload = () => {
                    c.src = reader.result;
                }

                reader.readAsDataURL(fileUser.files[0])
            })
        })
    </script>
@endsection

<div class="image">
    <label for="{{ $name }}">
        <div class="content">
            <div class="icon" id="icon">
                <svg aria-hidden="true" class="w-10 h-10 mb-3 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                    </path>
                </svg>
                <p>Clique para fazer upload</p>
            </div>
            <img class="user" id="{{ $id }}" src="{{ asset('') }}" alt="">
        </div>
        {{$title}}
    </label>
    <input type="file" name="{{ $name }}" id="{{ $name }}" class="hidden">
</div>
