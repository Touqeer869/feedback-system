<div>
    <div class="shadow  rounded-md overflow-hidden ">
        <div class="bg-white space-y-6  rounded-t-md">

            <form wire:submit.prevent="search">
                <div class="">
                    <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 flex items-center">
                            <span class="">Search Filters</span>
                        </h3>

                        <div class="grid grid-cols-10 gap-6">
                            <div class="col-span-8 sm:col-span-2 lg:col-span-3 xl:col-span-2">
                                <label for="supplier_name"
                                       class="block text-sm font-medium text-gray-700">Title</label>
                                <input id="supplier_name" type="text" autocomplete="off"
                                       wire:model="filters.title"
                                       class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <span class="text-xs text-gray-500">* Title of feedback</span>
                            </div>

                            <div class="col-span-8 sm:col-span-2 lg:col-span-3 xl:col-span-2">
                                <label for="category"
                                       class="block text-sm font-medium text-gray-700">Category</label>
                                <select wire:model="filters.category_id" name="category" class="block mt-1
                                            w-full rounded-md border-0 py-2 px-3 text-gray-500 border-gray-300 shadow-sm ring-1 ring-inset
                                            focus:ring-1 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                    <option>Choose an option</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-xs text-gray-500"
                                      id="email-description">* Category of Feedback</span>
                            </div>

                            <div class="col-span-8 sm:col-span-2 lg:col-span-3 xl:col-span-2">
                                <label for="user"
                                       class="block text-sm font-medium text-gray-700">User / Created By</label>
                                <input type="text" autocomplete="off" wire:model="filters.user"
                                       class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <span class="text-xs text-gray-500">* User who submitted feedback</span>
                            </div>

                            <div class="col-span-8 sm:col-span-2 lg:col-span-3 xl:col-span-2">
                                <div>

                                    <label for="per_page" class="block text-sm font-medium text-gray-700">Per
                                        Page</label>
                                    <select wire:model="per_page" name="per_page" class="block mt-1
                                            w-full rounded-md border-0 py-2 px-3 text-gray-500 border-gray-300 shadow-sm ring-1 ring-inset focus:ring-1 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="40">50</option>
                                        <option value="40">100</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-span-8 sm:col-span-3 lg:col-span-3 xl:col-span-2">
                                <button type="submit"
                                        class="bg-white mt-6 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Search
                                </button>
                                <button type="button" wire:click="clear"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-5 shadow sm:rounded-md">
        <div class="flex flex-col">
            <div class="-my-2  sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="bg-white py-6 px-4 space-y-6 sm:p-6  rounded-t-md">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Feedback</h3>
                            <a href="{{ route('feedback.add') }}"
                               class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                                Add Feedback
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 ">
            <tr>
                <th scope="col" class="px-3 py-3 text-left text-sm font-medium text-gray-500">
                    #
                </th>

                <th scope="col"
                    class="px-3 py-3 cursor-pointer text-left text-sm font-medium text-gray-500">
                    Title
                </th>
                <th scope="col"
                    class="px-3 py-3 cursor-pointer text-left text-sm font-medium text-gray-500">
                    Category
                </th>
                <th scope="col" class="px-3 py-3 text-left text-sm font-medium text-gray-500 content  ">
                    Created By
                </th>
                <th scope="col" class="px-3 py-3 text-left text-sm font-medium text-gray-500 content  ">
                    Action
                </th>
                <th scope="col" class="px-3 py-3 text-left text-sm font-medium text-gray-500 content  ">
                    View Comments
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($feedbacks as $feedback)
                <tr>
                    <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $feedback->title }}
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $feedback->category }}
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $feedback->user }}
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex">
                            <a href="javascript:void(0)"
                               class="">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="text-blue-500 hover:text-blue-600 cursor-pointer h-5 w-4"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </a>
                            <span class="mx-1 text-gray-500 font-light">|</span>
                            <a href="javascript:void(0)">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="text-red-500 hover:text-red-600 cursor-pointer h-5 w-4"
                                     fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </a>
                            <span class="mx-1 text-gray-500 font-light">|</span>

                            <a href="javascript:void(0)" wire:click="commentModal('{{$feedback->feedback_id}}')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor"
                                     class="text-green-500 hover:text-green-600 cursor-pointer h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"/>
                                </svg>

                            </a>
                        </div>
                    </td>

                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a href="javascript:void(0)" wire:click="viewModal('{{$feedback->feedback_id}}')"
                           class="bg-green-600 border border-transparent rounded-md
                           shadow-sm py-1 px-4 inline-flex justify-center text-sm font-medium text-white
                           hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">
                            View Comments
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($feedbacks->perPage() < $feedbacks -> total() )
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 rounded-md rounded-t-none">
                {{ $feedbacks->links() }}
            </div>
        @else
            <div class="bg-white py-2 border-t rounded-b-md"></div>
        @endif
    </div>

    <div x-data="{ open: @entangle('comment_modal') }" x-show="open" class="fixed z-10 inset-0 overflow-y-auto"
         aria-labelledby="modal-title" x-ref="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

            <div x-show="open" x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 x-description="Background overlay, show/hide based on modal state."
                 class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="open = false"
                 aria-hidden="true"></div>


            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>

            <div x-show="open" x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-description="Modal panel, show/hide based on modal state."
                 class="inline-block align-bottom bg-white rounded-lg px-4 sm:p-6 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-5xl sm:w-full">
                <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                    <button type="button"
                            class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            @click="open = false">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" x-description="Heroicon name: outline/x"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                @if($comment_modal)
                    @if(!empty($feedback_detail) && !empty($category_detail) )
                        <form wire:submit.prevent="addComment">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                @include('include.errors')
                                <div class="px-4 py-5 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Feedback Details
                                    </h3>

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                            <label for="title"
                                                   class="block text-sm font-medium text-gray-700">Title<span
                                                    class="text-red-500">*</span></label>
                                            <input disabled type="text" autocomplete="off"
                                                   wire:model="feedback_detail.title"
                                                   name="title"
                                                   class="mt-1 block w-full bg-gray-200 border border-gray-300
                                   rounded-md shadow-sm py-2 px-3 focus:outline-none
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                            <label for="category" class="block text-sm font-medium text-gray-700">Category
                                                <span
                                                    class="text-red-500">*</span>
                                            </label>
                                            <input type="text" disabled autocomplete="off"
                                                   wire:model="category_detail.name"
                                                   name="title"
                                                   class="mt-1 block w-full bg-gray-200 border border-gray-300
                                   rounded-md shadow-sm py-2 px-3 focus:outline-none
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                            <label for="description"
                                                   class="block text-sm font-medium text-gray-700">Description
                                                <span
                                                    class="text-red-500">*</span>
                                            </label>
                                            <textarea rows="1" wire:model="feedback_detail.description"
                                                      name="description"
                                                      autocomplete="off" disabled
                                                      class="mt-1 block min-w-full bg-gray-200 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </textarea>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                            <label for="category" class="block text-sm font-medium text-gray-700">Created
                                                By
                                                <span
                                                    class="text-red-500">*</span>
                                            </label>
                                            <input type="text" disabled autocomplete="off" wire:model="user.name"
                                                   name="title"
                                                   class="mt-1 block w-full bg-gray-200 border border-gray-300
                                   rounded-md shadow-sm py-2 px-3 focus:outline-none
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>

                                    </div>
                                </div>

                                <div class="px-4 py-5 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Add Comment
                                    </h3>

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                            <label for="title"
                                                   class="block text-sm font-medium text-gray-700">User Name<span
                                                    class="text-red-500">*</span></label>
                                            <input type="text" disabled autocomplete="off"
                                                   value="{{ Auth::user()->name }}"
                                                   name="title"
                                                   class="mt-1 block w-full bg-gray-200 border border-gray-300
                                   rounded-md shadow-sm py-2 px-3 focus:outline-none
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                            <label for="date" class="block text-sm font-medium text-gray-700">Date
                                                <span
                                                    class="text-red-500">*</span>
                                            </label>
                                            <input type="date" autocomplete="off" wire:model="comments.created_at"
                                                   name="date"
                                                   class="mt-1 block w-full bg-white border border-gray-300
                                               rounded-md shadow-sm py-2 px-3 focus:outline-none
                                               focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                        </div>
                                        <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                                            <label for="comment" class="block text-sm font-medium text-gray-700">Comment
                                                <span class="text-red-500">*</span>
                                            </label>
                                            <div wire:ignore>
                                                <trix-editor
                                                    class="formatted-content"
                                                    x-data
                                                    x-on:trix-change="$dispatch('input', event.target.value)"
                                                    x-ref="trix"
                                                    wire:model="comments.comment"
                                                    wire:key="uniqueKey"
                                                ></trix-editor>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                <button type="submit"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                                >
                                    Add Comment
                                </button>
                                <button type="button"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                                        @click="open = false">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    @endif
            </div>
        </div>
    </div>

    <div x-data="{ open: @entangle('view_modal') }" x-show="open" class="fixed z-10 inset-0 overflow-y-auto"
         aria-labelledby="modal-title" x-ref="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

            <div x-show="open" x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 x-description="Background overlay, show/hide based on modal state."
                 class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="open = false"
                 aria-hidden="true"></div>


            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>

            <div x-show="open" x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-description="Modal panel, show/hide based on modal state."
                 class="inline-block align-bottom bg-white rounded-lg px-4 sm:p-6 pt-5 pb-4 text-left
                 overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-5xl sm:w-full">

                <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                    <button type="button"
                            class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            @click="open = false">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" x-description="Heroicon name: outline/x"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                @if($view_modal)
                    @if(!empty($feedback_detail) && !empty($category_detail) )
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            @include('include.errors')
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Feedback Details
                                </h3>

                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                        <label for="title"
                                               class="block text-sm font-medium text-gray-700">Title<span
                                                class="text-red-500">*</span></label>
                                        <input disabled type="text" autocomplete="off"
                                               wire:model="feedback_detail.title"
                                               name="title"
                                               class="mt-1 block w-full bg-gray-200 border border-gray-300
                                   rounded-md shadow-sm py-2 px-3 focus:outline-none
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                        <label for="category" class="block text-sm font-medium text-gray-700">Category
                                            <span
                                                class="text-red-500">*</span>
                                        </label>
                                        <input type="text" disabled autocomplete="off"
                                               wire:model="category_detail.name"
                                               name="title"
                                               class="mt-1 block w-full bg-gray-200 border border-gray-300
                                   rounded-md shadow-sm py-2 px-3 focus:outline-none
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                        <label for="description"
                                               class="block text-sm font-medium text-gray-700">Description
                                            <span
                                                class="text-red-500">*</span>
                                        </label>
                                        <textarea rows="1" wire:model="feedback_detail.description"
                                                  name="description"
                                                  autocomplete="off" disabled
                                                  class="mt-1 block min-w-full bg-gray-200 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </textarea>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                        <label for="category" class="block text-sm font-medium text-gray-700">Created
                                            By
                                            <span
                                                class="text-red-500">*</span>
                                        </label>
                                        <input type="text" disabled autocomplete="off" wire:model="user.name"
                                               name="title"
                                               class="mt-1 block w-full bg-gray-200 border border-gray-300
                                   rounded-md shadow-sm py-2 px-3 focus:outline-none
                                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>

                                </div>
                            </div>
                            @endif
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Comments
                                </h3>

                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50 ">
                                    <tr>
                                        <th scope="col"
                                            class="px-3 py-3 text-left text-sm font-medium text-gray-500">
                                            #
                                        </th>

                                        <th scope="col"
                                            class="px-3 py-3 cursor-pointer text-left text-sm font-medium text-gray-500">
                                            Comment
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 cursor-pointer text-left text-sm font-medium text-gray-500">
                                            Created By
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-left text-sm font-medium text-gray-500 content  ">
                                            Created Date
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @if(!empty($comment_detail))
                                        @foreach($comment_detail as $cd)
                                            <tr>
                                                <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">

                                                    <div class="w-full max-w-xs mx-auto">
                                                        <textarea disabled x-data="{
                                                                        resize () {
                                                                            $el.style.height = '0px';
                                                                            $el.style.height = $el.scrollHeight + 'px'
                                                                        }
                                                                    }"
                                                                  x-init="resize()"
                                                                  @input="resize()"
                                                                  type="text"
                                                                  class="flex w-full h-auto min-h-[80px] px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background
                                                                  placeholder:text-neutral-400 focus:border-neutral-300
                                                                  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-100"
                                                        >
                                                            {{ strip_tags($cd->comment) }}
                                                        </textarea>
                                                    </div>
                                                </td>
                                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $cd->created_by }}
                                                </td>
                                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ date('d M Y h:i A',strtotime($cd->created_at)) }}
                                                </td>

                                            </tr>
                                        @endforeach

                                    @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>


                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <button type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                                @click="open = false">
                            Cancel
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
