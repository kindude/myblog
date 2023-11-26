<x-layout>
<div class="container mx-auto py-10">
        <h1 class="text-3xl text-center mb-8">Contact Form</h1>
        <form action="/send-form" method="post" class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="sender_email" class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500  border border-gray-400" required>
            </div>
            <div class="mb-4">
                <label for="subject" class="block text-gray-700">Subject:</label>
                <input type="text" id="subject" name="subject" class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500  border border-gray-400" required>
            </div>
            <div class="mb-6">
                <label for="message" class="block text-gray-700 mb-2">Message:</label>
                <textarea id="message" name="message" rows="4" class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500  border border-gray-400" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white rounded-md py-2 px-6 hover:bg-blue-600 focus:outline-none">Submit</button>
            </div>
        </form>
    </div>

</x-layout>