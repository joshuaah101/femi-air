<div class="mb-5 flex justify-between">
    <div class="flex flex-col w-full ">
        <header class="font-bold text-2xl font-sans text-gray-700">
            History
        </header>
        <p class="mt-2 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
              </svg>
            <span class="font-semibold text-xs">
                Joshua Faloye
            </span>
        </p>
    </div>

    <div class="flex items-center justify-end w-full">
        <a href="#" class="bg-red-600 text-white 
                            py-3 px-3 rounded-lg
                            text-sm font-bold
                            hover:bg-red-700 hover:text-red-100
                            flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <span class="">
                Clear History
            </span>
        </a>
    </div>
</div>
<hr class="mt-2"/>

 <!--Container-->
 <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2 mt-5">
    <!--Card-->
     <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        
        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">Name</th>
                    <th data-priority="2">Position</th>
                    <th data-priority="3">Office</th>
                    <th data-priority="4">Age</th>
                    <th data-priority="5">Start date</th>
                    <th data-priority="6">Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tina May</td>
                    <td>Coffee Manager</td>
                    <td>Ljubljana</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                </tr>
                
                <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
                
                <tr>
                    <td>Donna Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011/01/25</td>
                    <td>$112,000</td>
                </tr>
            </tbody>
            
        </table>
        
        
    </div>
    <!--/Card-->


</div>
{{-- /container --}}