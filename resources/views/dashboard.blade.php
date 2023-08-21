<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
</x-slot>
<x-app-layout>
    
<style>
    .card-img-container {
        position: relative;
        overflow: hidden;
        padding-top: 75%; 4:3 aspect ratio
    }

    .card-img-top {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: auto;
    }
    .application-deadline {
    background-color: #f2f2f2;
    padding: 10px;
    border-radius: 4px;
    }
    .read-more-link {
        color: #007bff;
        cursor: pointer;
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

        @if(Auth::user()->isAdmin())
        <div class="container mb-3">
            <a href="{{ route('internship.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Create New Internship</a>
        </div>
        @endif
    
    @livewire('livewire-ui-modal')
    @livewireScripts
 
<div class="category-buttons mb-3">
    <a href="{{ route('internship.index') }}" class="btn btn-primary">All</a>
    <a href="{{ route('internship.index', ['category' => 'Technology']) }}" class="btn btn-primary">Technology</a>
    <a href="{{ route('internship.index', ['category' => 'Engineering']) }}" class="btn btn-primary">Engineering</a>
    <a href="{{ route('internship.index', ['category' => 'Business']) }}" class="btn btn-primary">Business</a>
    <a href="{{ route('internship.index', ['category' => 'Law']) }}" class="btn btn-primary">Law</a>
</div>
    <div class="row">
        @foreach($company as $comp)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-img-container">
                    <img src="{{asset('storage/images/'.$comp->image_url) }}" class="card-img-top" alt="Company Logo">
                </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$comp->company_name}}</h5>
                        <p class="card-text"><strong>Position:</strong> {{$comp->position}}</p>
                        <p class="card-text"><strong>Job Type:</strong> {{$comp->job_type}}</p>
                        <p class="card-text"><strong>Location:</strong> {{$comp->location}}</p>
                        
                        <!-- Collapsible Description -->
                        <livewire:read-more-component :description="$comp->description" />
                        <div class="mb-3">
                        </div>    
                        <!-- Application Deadline -->
                        <p class="card-text application-deadline">
                            <strong>Application Deadline:</strong>
                            <span>{{$comp->application_deadline}}</span>
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <button type="button" class="btn btn-primary"><i class="far fa-thumbs-up me-2"></i> Like</button>
                            <button type="button" class="btn btn-secondary"><i class="fas fa-share me-2"></i> Share</button>
                        </div>
                        <div class="d-grid gap-2">
                                <button type="button" onclick="Livewire.emit('openModal', 'reviewmodal')" class="btn btn-success btn-equal-size"><i class="fa fa-check me-2"></i> Apply</button>
                                <button type="button" class="btn btn-primary btn-equal-size"><i class="fa fa-star me-2"></i> Leave Review</button>
                        </div>
                    </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>


