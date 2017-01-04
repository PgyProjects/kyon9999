@extends ('backstage.starter.starter')

@section ('css')
    <link rel="stylesheet" href="/backstage/plugins/datatables/dataTables.bootstrap.css">
    @endsection

@section ('main')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        @foreach ($fields_index as $field => $field_info)
                            <th>{{$field_info['show']}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $model)
                        <tr>
                            @foreach (array_keys($fields_index) as $v)
                                <td>{{$model->$v}}</td>
                            @endforeach
                        </tr>
                    @endforeach
                        <tr>
                        <td>Other browsers</td>
                        <td>All others</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        @foreach ($fields_index as $field => $field_info)
                            <th>{{$field_info['show']}}</th>
                        @endforeach
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->


@endsection

@section ('js')
    <!-- DataTables -->
    <script src="/backstage/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/backstage/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/backstage/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/backstage/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/backstage/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
    @endsection