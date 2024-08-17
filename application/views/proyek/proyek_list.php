<?php
    $data = $proyek_list['data'];
    $status = $proyek_list['status'];
    $message = $proyek_list['message']; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Proyek dan Lokasi</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/style/output.css'); ?>">
</head>
<body>
    <div class="px-4 sm:px-6 lg:px-8 mx-[150px]">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Project</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the project.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add project</button>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Nama Proyek</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Pimpinan proyek</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Client</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Start Date</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">End Date</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Keterangan</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                <span class="sr-only">Edit</span>
                            </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <?php foreach($proyek_list['data'] as $proyek): ?>
                            <tr>
                                <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="font-medium text-gray-900"><?php echo ($proyek['namaProyek'])?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                    <div class="text-gray-900">Front-end Developer</div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                    <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>
                                </td>
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">Member</td>
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">Member</td>
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">Member</td>
                                <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
