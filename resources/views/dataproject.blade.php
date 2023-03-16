
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (Auth::user()->hasRole('gardener'))
                        <a href="{{ route('project.create') }}" class="btn btn-md btn-success mb-3 float-right">New Project</a>
                    @endif
                    @if (Auth::user()->hasRole('designer'))
                        <a href="{{ route('project.create') }}" class="btn btn-md btn-success mb-3 float-right">New Project</a>
                    @endif
                    <table id="example2" class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Project</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                @if (Auth::user()->hasRole('gardener'))
                                    <th scope="col">Action</th>
                                @endif
                                @if (Auth::user()->hasRole('designer'))
                                    <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach($project as $project)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$project->namaproject}}</td>
                                <td>{{$project->keterangan}}</td>
                                <td>{{$project->status}}</td>
                                @if (Auth::user()->hasRole('gardener'))
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('project.destroy', $project->id) }}" method="POST">
                                            <a href="{{ route('project.edit', $project->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                @endif
                                @if (Auth::user()->hasRole('designer'))
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('project.destroy', $project->id) }}" method="POST">
                                            <a href="{{ route('project.edit', $project->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{asset('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('template/plugins/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('template/plugins/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('template/plugins/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
        <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="{{asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>
        
</x-app-layout>