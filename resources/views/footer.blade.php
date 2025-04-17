<x-app-layout>
    <x-slot name="footer">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Footer') }}
        </h2>
    </x-slot>
    <div>
        <div class="max-w-xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h2 class="text-2xl font-bold mb-6 text-center text-gray-800 dark:text-gray-100">Footer</h2>

                <p class="text-center text-gray-600 dark:text-gray-400">This is the footer content.</p>
            </div>
        </div>
    </div>
    <html>
        <body>
            <footer class="bg-gray-800 text-white py-4">
                <div class="container mx-auto text-center">
                    <p>&copy; 2023 Your Company. All rights reserved.</p>
                </div>
            </footer>
        </body> 
    </html>
