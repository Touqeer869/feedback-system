<div>
    <div class="pb-5">
        <div class="flex items-center justify-between">
            <h3 class="text-lg leading-6 font-medium text-gray-900 flex items-center">
                <a href="{{ route('feedback.index') }}"
                   class="p-3 bg-gray-200 border-2 rounded-md  border-gray-400 cursor-pointer hover:bg-gray-300 ">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            fill-rule="evenodd"
                            d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <span class="ml-4">Feedback</span>
            </h3>
        </div>
    </div>
    <form wire:submit.prevent="save">

        <div class="shadow  rounded-md overflow-hidden ">
            <div class="bg-white space-y-6  rounded-t-md">
                <div class="bg-white py-6 px-4 space-y-6 sm:p-6">

                    @include('include.errors')

                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                            <label for="title"
                                   class="block text-sm font-medium text-gray-700">Title<span
                                    class="text-red-500">*</span></label>
                            <input type="text" autocomplete="off" wire:model="feedback.title"
                                   name="title"
                                   class="mt-1 block w-full bg-white border border-gray-300
                                   rounded-md shadow-sm py-2 px-3 focus:outline-none
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                            <label for="category" class="block text-sm font-medium text-gray-700">Category
                                <span
                                    class="text-red-500">*</span>
                            </label>
                            <select wire:model="feedback.category_id" name="category" autocomplete="country-name" class="block mt-1
                                w-full rounded-md border-0 py-2 px-3 text-gray-500 border-gray-300 shadow-sm ring-1 ring-inset
                               focus:ring-1 focus:ring-inset focus:ring-indigo-500 sm:text-sm
                                sm:leading-6">
                                <option>Choose an option</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                                </select>
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                            <label for="description"
                                   class="block text-sm font-medium text-gray-700">Description
                                <span
                                    class="text-red-500">*</span>
                            </label>
                            <textarea wire:model="feedback.description" name="description"
                                      autocomplete="off" id="description"
                                      class="mt-1 block min-w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <div wire:loading wire:target="save">
                        Saving...
                    </div>
                    <div wire:loading.remove wire:target="save">
                        Save
                    </div>
                </button>


            </div>
        </div>
    </form>
</div>
