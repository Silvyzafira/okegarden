
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" keterangan="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" keterangan="ie=edge">
    <meta name="csrf-token" keterangan="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('project.update', $project->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="namaproject">Nama Project</label>
                                <input type="text" class="form-control @error('namaproject') is-invalid @enderror"
                                    name="namaproject" value="{{ old('namaproject', $project->namaproject) }}" required>

                                <!-- error message untuk namaproject -->
                                @error('namaproject')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea
                                    name="keterangan" id="keterangan"
                                    class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan"
                                    rows="5" required>{{ old('keterangan', $project->keterangan) }}</textarea>

                                <!-- error message untuk keterangan -->
                                @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="1" {{ $project->status == 1 ? 'selected':'' }}>Ready</option>
                                    <option value="0" {{ $project->status == 0 ? 'selected':'' }}>Ongoing</option>
                                    <option value="2" {{ $project->status == 2 ? 'selected':'' }}>Done</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('project.index') }}" class="btn btn-md btn-secondary">back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#keterangan').summernote({
                height: 250, //set editable area's height
            });
        })
    </script>
</body>

</html>