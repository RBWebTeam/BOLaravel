@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
 


 <div class="container">
    <h1 class="page-header text-center"> </h1>
    <div id="members">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-12">
                    <h2>Member List
                    <button class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Member</button>
                    </h2>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr v-for="member in members">
                        <td>@{{ member.TicketRequestId }}</td>
                        <td>@{{ member.CateName }}</td>
                        <td>
                            <button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</button> <button class="btn btn-danger" v-on:click="deleteItem(member.TicketRequestId)" ><span class="glyphicon glyphicon-trash"></span> Delete</button>
 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


</div>
 </div>


<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.1.6/vue.min.js">  </script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
     var app = new Vue({
    el: '#members',
    data:{
 
        members: []
    },
 
    mounted: function(){
        this.getAllMembers();
    },
 
    methods:{
        getAllMembers: function(){
            axios.get("test1")
                .then(function(response){
                    //console.log(response);
                    app.members = response.data;
                });
        }
        ,
        deleteItem(id){
            axios.get("test2/"+id)
                .then(function(response){
                     console.log(response);
                });



        }
    }
});
    </script>

@endsection