<footer>
        <div class="container">
            <p>Copyright @ 2021 IAKN Tarutung</p>
            <a href="#">contact us</a>
        </div>

        <div class="foot-nav">
            <a href="/" ><img src="{{url('/assets/img/homed.svg')}}" alt=""></a>
            <a href="alur"><img src="{{url('/assets/img/flow.svg')}}" alt=""></a>
            <a href="pengumuman"><img src="{{url('/assets/img/notice.svg')}}" alt=""></a>
            <a href="uang-kuliah"><img src="{{url('/assets/img/money.svg')}}" alt=""></a>
            <a href="program-studi"><img src="{{url('/assets/img/study.svg')}}" alt=""></a>
        </div>
    </footer>
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
<script src="{{ asset('/src/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/script.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if(session()->has('success'))
<script>
  Swal.fire(
  'Berhasil',
  '{{session()->get('success')}}',
  'success'
)
</script>
@endif

@if(session()->has('error'))
<script>
  Swal.fire(
  'Coba lagi',
  '{{session()->get('error')}}',
  'error'
)
</script>
@endif