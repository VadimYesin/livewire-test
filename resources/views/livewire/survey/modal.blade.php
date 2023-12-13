<div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
    @if($survey)
        <div id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form wire:submit.prevent="submit">
                        @foreach ($survey->questions as $question)
                            <div class="mb-4">
                                <label class="block text-gray-200 text-sm font-bold mb-2">{{ $question['title'] }}</label>

                                @if ($question['type'] == \App\Models\Question::INPUT_NUMBER_TYPE)
                                    <input wire:model='answer.first' type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                                @elseif ($question['type'] == \App\Models\Question::INPUT_CHECKBOX_TYPE && is_array($question['options']))
                                    @foreach ($question['options'] as $option)
                                        <div class="mb-3">
                                            <label class="inline-flex items-center">
                                                <input wire:model='answer.{{ $question->id }}' type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600" value="{{ $option }}">
                                                <span class="ml-2 text-gray-200">{{ $option }}</span>
                                            </label>
                                        </div>
                                    @endforeach

                                @elseif ($question['type'] == \App\Models\Question::INPUT_DROPDOWN_TYPE && is_array($question['options']))
                                    <select wire:model='answer.{{ $question->id }}' class="block appearance-none w-full bg-gray-700 border border-gray-200 text-white py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500" >
                                        @foreach ($question['options'] as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>

                                @else
                                    <input wire:model='answer.{{ $question->id }}' type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                                @endif
                            </div>
                        @endforeach

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if($submissions)
        <div class="overflow-x-auto relative my-4 shadow-md sm:rounded-lg bg-gray-800 text-white">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-400 uppercase bg-gray-700">
                <tr>
                    <th scope="col" class="py-3 px-6">Unit Title</th>
                    <th scope="col" class="py-3 px-6">Answer</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($submissions as $submission)
                    <tr class="bg-gray-800 border-b border-gray-700">
                        <td class="py-4 px-6">{{ $submission->unit->title }}</td>
                        <td class="py-4 px-6">{{ $submission->answer }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
