<script src="{{ asset('js/toastr.js') }}" ></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "9900",
        "hideDuration": "9500",
        "timeOut": "9000",
        "extendedTimeOut": "9000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    <?php
        if(Session::has('error') && Session::get('error') != ''){
        ?>toastr["error"]("{{Session::get('error') }}");
    <?php
        Session::forget('error');
        }
        elseif(isset($errors) && $errors->any()){
        foreach($errors->messages() as $error){
        if($error !== ''){ ?>
        toastr["error"]("{{  is_array($error)?$error[0]:$error}}");
    <?php }
        }
        Session::forget('errors');
        } elseif(Session::has('info') && Session::get('info') != ''){
        ?>
        toastr["info"]("{{Session::get('info')}}");
    <?php
        Session::forget('info');
        }
        elseif(Session::has('success') && Session::get('success') != ''){
        ?>
        toastr["success"]("{{Session::get('success')}}");
    <?php
    Session::forget('success');
    }

    ?>
    $(document).ready(function () {
        window.livewire.on('alert', data => {
            toastr[data.type](data.message);
        });
    })
</script>

