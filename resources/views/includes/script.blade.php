@section('scriptUser')
    <script>
        let {{ $class }} = document.querySelector("img.{{ $class }}")
        let fileUser = document.getElementById("{{ $name }}")
        let iconUser = document.getElementById('icon')

        {{ $class }}.addEventListener('click', () => {
            fileUser.click()
        })

        fileUser.addEventListener('change', (event) => {

            icon.classList.add('text-[#c4c4c4]')
            let reader = new FileReader();

            reader.onload = () => {
                {{ $class }}.src = reader.result
            }

            reader.readAsDataURL(fileUser.files[0])
        })
    </script>
@endsection