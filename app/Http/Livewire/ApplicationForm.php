<?php

namespace App\Http\Livewire;
use App\Models\Internship;
use App\Http\Controllers\InternshipController;
use LivewireUI\Modal\ModalComponent;
use App\Models\Application;
use Livewire\Component;
use Livewire\WithFileUploads;


class ApplicationForm extends Component
{
    public $internshipId;
    public $name;
    public $email;
    public $cv;
    public $requirements;

    public function showModal()
    {
        $this->reset();
        $this->emit('showModal');
    }

    public function submitApplication()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'cv' => 'required|file|mimes:pdf',
            'requirements' => 'required|file|mimes:txt',
        ]);

        // Upload CV and Requirements files
        $cvFileName = $this->cv->store('cv_files', 'public');
        $requirementsFileName = $this->requirements->store('requirements_files', 'public');

        // Create the application entry
        $applicationData = [
            'user_id' => auth()->user()->id,
            'internship_id' => $this->internshipId,
            'cv_path' => $cvFileName,
            'requirements_path' => $requirementsFileName,
        ];

        Application::create($applicationData);
        // Close the modal
        $this->emit('closeModal');

        // Optionally emit an event to notify other components about the successful submission
        $this->emit('applicationSubmitted');

        // Clear form fields
        $this->resetFields();
    }
    private function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->cv = null;
        $this->requirements = null;
    }

    public function render()
    {
        return view('livewire.application-form');
    }
}
