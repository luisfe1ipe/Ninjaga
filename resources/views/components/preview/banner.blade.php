@section('scriptBanner')
    <script>
        let photo = document.getElementById('photo')
        let file = document.getElementById("{{ $name }}")
        let icon = document.getElementById('icon')

        photo.addEventListener('click', () => {
            file.click()
        })

        file.addEventListener('change', (event) => {

            icon.classList.add('text-[#c4c4c4]')
            let reader = new FileReader();

            reader.onload = () => {
                photo.src = reader.result
            }

            reader.readAsDataURL(file.files[0])
        })
    </script>
@endsection

<div class="image-container relative">
    <label for="{{ $name }}">
        Escolha uma imagem
        <div class="content @if ($errors->has('banner')) error-input @endif"">
            <div class="icon" id="icon">
                <svg aria-hidden="true" class="w-10 h-10 mb-3 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                    </path>
                </svg>
                <p>Clique para fazer upload</p>
            </div>
            <img id="photo" src="{{ $image }}" alt="">
        </div>
    </label>
    <input type="file" name="{{ $name }}" id="{{ $name }}" class="hidden">
    @if ($errors->has('banner'))
        <span class="message-error">
            @foreach ($errors->get('banner') as $error)
                {{ $error }}
            @endforeach
        </span>
    @endif
</div>
