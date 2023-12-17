<div class="p-5 bg-gray-800">
    @if($submission)
        <div id="deleteSubmission" tabindex="-1" role="dialog" aria-labelledby="deleteSubmissionLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form wire:submit="submit">
                        <h5 class="text-white font-bold my-2">Are you sure want to delete {{ $submission->title }} submission?</h5>
                        <button type="submit" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
