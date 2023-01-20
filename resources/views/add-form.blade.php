<html>
    <body>
        <h1>Heating Stats</h1>
 
        @if (session('success'))
            <strong>{{ session('success') }}</strong>
            <img src="{{ asset('storage/' . session('image')) }}" />
        @endif
        
        <form method="POST" action="{{ route('store-value') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" />
            <button type="submit">Upload</button>
        </form>

    </body>
</html>