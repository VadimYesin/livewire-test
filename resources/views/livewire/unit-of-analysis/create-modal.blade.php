<div class="py-5 px-5">
    <!-- Modal -->
    <div id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="submit" class="space-y-4">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Create Unit of Analysis</h5>
                    </div>
                    <div class="p-4">
                        <!-- Type Field -->
                        <div class="form-group">
                            <label for="typeID">Type</label>
                            <select wire:model="typeID" id="typeID" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Select Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Title Field -->
                        <div class="form-group">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input wire:model="title" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="title" placeholder="Enter title">
                        </div>
                    </div>
                    <div class="flex justify-end p-4">
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-black bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 focus:ring-opacity-50">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
