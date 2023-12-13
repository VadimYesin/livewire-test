<div class="overflow-x-auto bg-gray-800 p-4 rounded-lg">
    <table class="min-w-full text-white">
        <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-400 uppercase border-b border-gray-700 bg-gray-800">
            <th class="px-4 py-3">Type</th>
            <th class="px-4 py-3">Title</th>
            <th class="px-4 py-3">User ID</th>
            <th class="px-4 py-3">Action</th>
        </tr>
        </thead>
        <tbody class="bg-gray-700">
        @foreach ($units as $unit)
            <tr class="bg-gray-800 border-b border-gray-700">
                <td class="px-4 py-3 text-sm">{{ $unit->type->name }}</td>
                <td class="px-4 py-3 text-sm">{{ $unit->title }}</td>
                <td class="px-4 py-3 text-sm">{{ $unit->user->name }}</td>
                <td class="px-4 py-3 text-sm">
                    <button onclick="Livewire.dispatchTo('survey.modal', 'openSurveyModal', { typeID: {{ $unit->type->id }}, uoaID: {{ $unit->id }} })"
                            class="px-3 py-2 text-sm border border-gray-200 rounded-md">Survey</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
