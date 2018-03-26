 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Finmart Home page</title>
        <link rel="icon" href="favicon.png" type="image/x-icon" />
        <link type="text/css" rel="stylesheet" href="{{url('stylesheets/sidebar.css')}}">
        <link type="text/css" rel="stylesheet" href="{{url('stylesheets/bootstrap.min.css')}}"> 
        <link type="text/css" rel="stylesheet" href="{{url('stylesheets/style.css')}}">
        <link href="{{url('stylesheets/datepicker.css')}}" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('service-worker.js').then(()=>{
                    console.log("registered")
                }).catch((e)=>{
                    console.log("Old browser :-( ")
                })
                ;
                }


        </script>
   </head>