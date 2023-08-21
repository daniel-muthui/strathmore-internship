<!-- <div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Apply for Internship</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="applyForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="cv" class="form-label">Upload CV</label>
                        <input type="file" class="form-control" id="cv">
                    </div>
                    <div class="mb-3">
                        <label for="requirements" class="form-label">Upload Requirements</label>
                        <input type="file" class="form-control" id="requirements">
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" id="checkRequirements">Check Requirements</button>
                        <span id="requirementsStatus"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="applyButton" disabled>Apply</button>
            </div>
       

            <div> -->
    <!-- ... Modal content ... -->
    <div>
    <!-- ... Modal content ... -->
    <div class="modal-body">
        <!-- ... Form fields ... -->

        <div class="mb-3">
            <button type="button" class="btn btn-primary" id="checkRequirements">Check Requirements</button>
            <span id="requirementsStatus"></span>
        </div>
    </div>
    <!-- ... Modal footer ... -->
</div>

<script>
    document.getElementById('checkRequirements').addEventListener('click', function() {
        const uploadedRequirements = document.getElementById('requirements').files[0];
        
        if (uploadedRequirements) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const requirementsText = event.target.result;
                
                // Fetch description data from the server
                fetch('/fetch-description') // Replace with the actual route
                    .then(response => response.json())
                    .then(data => {
                        const requiredSkills = data.required_skills.split('\n');
                        
                        let allRequirementsMet = true;
                        for (const skill of requiredSkills) {
                            if (!requirementsText.includes(skill)) {
                                allRequirementsMet = false;
                                break;
                            }
                        }
                        
                        if (allRequirementsMet) {
                            document.getElementById('applyButton').disabled = false;
                            document.getElementById('requirementsStatus').innerText = 'Requirements met!';
                        } else {
                            document.getElementById('applyButton').disabled = true;
                            document.getElementById('requirementsStatus').innerText = 'Requirements not met';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching description data:', error);
                    });
            };
            
            reader.readAsText(uploadedRequirements);
        } else {
            document.getElementById('requirementsStatus').innerText = 'Please upload requirements';
        }
    });
</script>
