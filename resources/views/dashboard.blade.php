<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Your custom dashboard content -->
    <div class="p-4">
        <!-- Finance and Expense Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="bg-purple-700 rounded-lg p-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-white text-lg">Total Income</h2>
                        <p class="text-white text-2xl font-bold">9,900k</p>
                    </div>
                    <div class="text-white text-lg">+70%</div>
                </div>
            </div>
            <div class="bg-purple-600 rounded-lg p-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-white text-lg">Total Expense</h2>
                        <p class="text-white text-2xl font-bold">8,240k</p>
                    </div>
                    <div class="text-white text-lg">+80%</div>
                </div>
            </div>
        </div>

        <!-- Graph and Finance Target -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="bg-gray-800 rounded-lg p-4">
                <h2 class="text-white text-lg mb-4">Monday, 28 December 2021</h2>
                <div class="relative">
                    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
                        <span class="bg-purple-600 text-white px-2 py-1 rounded-full">$2957</span>
                    </div>
                    <img alt="Graph showing financial data over the week" class="w-full h-40 object-cover rounded-lg" height="200" src="https://storage.googleapis.com/a1aa/image/_rFmUl0XBxYMtvYQIMd684CuqfvKaMbbL33HE9Nqogs.jpg" width="300"/>
                </div>
                <div class="flex justify-between mt-4 text-gray-400">
                    <span>Mon</span>
                    <span>Tue</span>
                    <span>Wed</span>
                    <span>Thu</span>
                    <span>Fri</span>
                    <span>Sat</span>
                    <span>Sun</span>
                </div>
            </div>
            <div class="bg-gray-800 rounded-lg p-4">
                <h2 class="text-white text-lg mb-4">Your Finance Target</h2>
                <div class="relative">
                    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
                        <span class="text-white text-2xl font-bold">78%</span>
                    </div>
                    <img alt="Circular progress bar showing 78% completion" class="w-full h-40 object-cover rounded-lg" height="200" src="https://storage.googleapis.com/a1aa/image/-2OlXpz7u01W8bKb4vRMbd3yx1ZfQMCkhoJBiT40ocs.jpg" width="200"/>
                </div>
                <div class="mt-4">
                    <div class="flex items-center mb-2">
                        <span class="bg-purple-600 w-3 h-3 rounded-full inline-block mr-2"></span>
                        <span class="text-white">Result Achieved</span>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-gray-400 w-3 h-3 rounded-full inline-block mr-2"></span>
                        <span class="text-white">In The Process</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects Finance -->
        <div class="bg-gray-800 rounded-lg p-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-white text-lg">Projects Finance</h2>
                <a class="text-purple-600" href="#">View all</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-400">
                            <th class="py-2">Name</th>
                            <th class="py-2">Progress</th>
                            <th class="py-2">Achieved</th>
                            <th class="py-2">Status</th>
                            <th class="py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t border-gray-700">
                            <td class="py-2 flex items-center">
                                <img alt="Profile picture of Darby Day" class="w-8 h-8 rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/sxPSKtnhvr5PV4wSmmJek4AyX7tY29iKW_m58xaM8tE.jpg" width="30"/>
                                <span class="text-white">Darby Day</span>
                            </td>
                            <td class="py-2 text-white">Meet the target</td>
                            <td class="py-2 text-white">$145,000</td>
                            <td class="py-2 text-purple-600">Financial Officer</td>
                            <td class="py-2 text-right">
                                <i class="fas fa-ellipsis-h text-gray-400"></i>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-700">
                            <td class="py-2 flex items-center">
                                <img alt="Profile picture of Helt Diven" class="w-8 h-8 rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/lLV5p6yThCf4itAIdQqpwfIUsZB9Ddd8Xg-mN8WwM0w.jpg" width="30"/>
                                <span class="text-white">Helt Diven</span>
                            </td>
                            <td class="py-2 text-white">On Going</td>
                            <td class="py-2 text-white">$299,000</td>
                            <td class="py-2 text-purple-600">Project Manager</td>
                            <td class="py-2 text-right">
                                <i class="fas fa-ellipsis-h text-gray-400"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
