                <?php
                //<div class="bg-white p-6 rounded-lg shadow-md">
                  //  <h3 class="text-xl font-bold mb-4">Book Record</h3>
                    
                    $u = new data;
                    $recordset = $u->getissuebook($userId);

                    echo "<table class='min-w-full table-auto border-collapse border border-gray-300'>";
                    echo "<thead class='bg-gray-200'>
                            <tr>
                                <th class='px-6 py-4 text-left border'>Name</th>
                                <th class='px-6 py-4 text-left border'>Book Name</th>
                                <th class='px-6 py-4 text-left border'>Issue Date</th>
                                <th class='px-6 py-4 text-left border'>Return Date</th>
                                <th class='px-6 py-4 text-left border'>Fine</th>
                                <th class='px-6 py-4 text-left border'>Return</th>
                            </tr>
                          </thead><tbody>";

                    foreach ($recordset as $row) {
                        echo "<tr class='border-b'>
                                <td class='px-6 py-4 border'>{$row[0]}</td>
                                <td class='px-6 py-4 border'>{$row[2]}</td>
                                <td class='px-6 py-4 border'>{$row[3]}</td>
                                <td class='px-6 py-4 border'>{$row[6]}</td>
                                <td class='px-6 py-4 border'>{$row[7]}</td>
                                <td class='px-6 py-4 border'>
                                    <a href='UserDashboard.php?returnid={$row[0]}&userlogid=$userId'>
                                        <button type='button' class='bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600'>Return</button>
                                    </a>
                                </td>
                              </tr>";
                    }

                    echo "</tbody></table>";
                    
               // </div>
            //</div>
            ?>