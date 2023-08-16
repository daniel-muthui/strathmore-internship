<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
</x-slot>
<x-app-layout>
    
<style>
.card {
    display: block; 
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
    transition: box-shadow .25s; 
}
.card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-card {
  width: 10%;
  height:10px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
  overflow: hidden;
}
.img-card img{
  width: 5%;
  height: 5px;
  object-fit:cover; 
  transition: all .25s ease;
}
</style>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
    <!-- @livewireStyles -->

    <!-- Scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <div class="container mt-4">
        @if(Session('success'))
        <div class="alert alert-success">
            {{Session('success')}}
        </div>
        @endif
        @if(Session('fail'))
        <div class="alert alert-danger">
            {{Session('fail')}}
        </div>
        @endif
   
    
    @livewire('livewire-ui-modal')
    @livewireScripts
    <div class="row">
        @foreach($company as $comp)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{asset('storage/images/'.$comp->image_url) }}"  class="card-img-top" alt="Company Logo"> <!-- Add image here -->
                <div class="card-body">
                    <div class='comp-form d-flex flex-column gap-3'>
                        <div class='d-flex gap-2'>
                            <label for='comp_nm'>Company Name:</label>
                            <input type='text' id='comp_nm' class='form-control border-0' disabled data-name='company_name' value="{{$comp->company_name}}"/>
                        </div>
                        <div class='d-flex gap-2'>
                            <label for='comp_pos'>Position: </label>
                            <input type='text' id='comp_pos' class='form-control border-0' disabled data-name='position' value="{{$comp->position}}"/>
                        </div>
                        <div class='d-flex gap-2'>
                            <label for='comp_job'>Job type: </label>
                            <input type='text' id='comp_job' class='form-control border-0' disabled data-name='job_type' value="{{$comp->job_type}}"/>
                        </div>
                        <div class='d-flex gap-2'>
                            <label for='comp_des'>Description: </label>
                            <input type='text' id='comp_des' class='form-control ' disabled data-name='description' value="{{$comp->description}}"/>
                        </div>
                        <div class='d-flex gap-2'>
                            <label for='comp_loc'>Location: </label>
                            <input type='text' id='comp_loc' class='form-control border-0' disabled data-name='location' value="{{$comp->location}}"/>
                        </div>
                        <div class='d-flex gap-2'>
                            <label for='comp_app'>Application Deadline: </label>
                            <input type='date' id='comp_app' class='form-control border-0' disabled data-name='application_deadline' value="{{$comp->application_deadline}}"/>
                        </div>
                        <div class="small d-flex justify-content-start">
                            <a href="#!" class="d-flex align-items-center me-3">
                                <i class="far fa-thumbs-up me-2"></i>
                                <p class="mb-0">Like</p>
                            </a>
                            <a href="#!" class="d-flex align-items-center me-3">
                                <i class="fas fa-share me-2"></i>
                                <p class="mb-0">Share</p>
                            </a>
                        </div>
                        <button type="button" onclick="Livewire.emit('openModal', 'reviewmodal')" class="btn btn-success"><i class="fa fa-check"></i> Apply</button>
                        <button type="button" class="btn btn-info ml-2"><i class="fa fa-check"></i> Leave Review</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>


