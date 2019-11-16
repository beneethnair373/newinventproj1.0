@extends('layouts.master')
@section('content')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<div id ='app'>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
   Inventory
  </a>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Add Item</button>

<div class="modal" tabindex="-1" id="exampleModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="Name">
  </div>
  <div class="form-group">
    <label for="name">Quantity</label>
    <input type="text" class="form-control" id="Name">
  </div>
  <div class="form-group">
  <label for="sel1">Category</label>
  <select class="form-control" id="sel1">
    <option class="dropdown-item" href="#">Equipment</option>
    <option class="dropdown-item" href="#">Utensils</option>
  </select>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</nav>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
</table>
</div>
@endsection

@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script>
       var vm = new Vue({
      el:'#app',
      data:{
        items:items,
        add_item: {
          inventory_id: 1,
          title:'',
        }
      },
      methods: {
        postNewTask() {
          axios.post('/projects/'+this.project.id+'/tasks', this.new_task)
            .then(({data})=>{
              this.tasks.push(data);
              this.new_task.title = '';
              console.log(data);
            });
        },
        deleteTask(task) {
          axios.post('/tasks/'+task.id+'/delete')
            .then(function(response){
              var index = vm.tasks.indexOf(task);
              vm.tasks.splice(index, 1);
            });
        }
      }
    });
  </script>
@endsection