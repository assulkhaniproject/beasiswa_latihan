
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('admin/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.js')}}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('admin/assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script src="{{asset('admin/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
    <script src="{{asset('admin/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>

    <script src="{{asset('admin/plugins/apex/apexcharts.min.js')}}"></script>
{{--    <script src="{{asset('admin/assets/js/dashboard/dash_1.js')}}"></script>--}}

<script>
    $('#html5-extension').DataTable( {
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [
                { extend: 'copy', className: 'btn' },
                { extend: 'csv', className: 'btn' },
                { extend: 'excel', className: 'btn' },
                { extend: 'print', className: 'btn' }
            ]
        },
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    } );
</script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{asset('admin/assets/js/pages/helpdesk.js')}}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('admin/plugins/lightbox/photoswipe.min.js')}}"></script>
    <script src="{{asset('admin/plugins/lightbox/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{asset('admin/plugins/lightbox/custom-photswipe.js')}}"></script>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script>

        Pusher.logToConsole = true;
        //const notif = document.querySelector('#notif');
        const notify = document.querySelector('#notify');
        //const notifDropdown = document.querySelector('#notif-dropdown');

        async function notification() {

            let item  = ``;
            const notifyData = await getNotify();
            // notif.innerHTML = showNotif(notifyData['count'])

            notify.innerText = notifyData['count']

            const pusher = new Pusher('6ea04fea348ffbcb0ed0', {
                cluster: 'ap1',
                encrypted : true,
            });
            const channel = pusher.subscribe('beasiswa-channel');
            channel.bind('beasiswa-event',async function(data) {

                const newNotifyData = await getNotify();
                console.log(newNotifyData);
                notify.innerText = newNotifyData['count']

                // swal({
                //     title: "Pemilik baru telah hadir",
                //     allowOutsideClick: false
                // },function() {
                //     window.location = url+'notif';
                // });
            });
        }
        function  getNotify() {
            const url = '{{config("app.url")}}';
            return fetch(url+'prodi/notify').then(res => res.json()).then(res => res);
        }

        function showNotif(count){
            return `<a href="{{ route('beasiswas.index') }}">
                    <span class="badge badge-danger" id="notify">${count}</span>
                </a>`;
        }

        notification()
    </script>

    @yield('script')

