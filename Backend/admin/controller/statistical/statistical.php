    <main style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px
#bebebe, -35px -35px 70px #ffffff; " class="w-full  p-5 mt-5 bg-gray-100">
        <section class="list__accounts w-full">
            <section class="list__accounts-title   flex items-center gap-2">
                <h1 class="text-left text-xl text-gray-500 uppercase">
                    Statistical
                </h1>
            </section>
            <div class="px-10 flex justify-between w-full  mt-4">
                <table class="text-center rounded-md shadow-md my-3 col-span-2">
                    <thead class="boder bg-gray-200 px-2 rounded-t-md">
                        <tr>
                            <th class=" text-xs  p-2 w-20 font-medium">
                                ID
                            </th>
                            <th class=" text-xs  p-2 font-medium">
                                Category name
                            </th>
                            <th class=" text-xs  p-2 font-medium">
                                Quantity
                            </th>
                            <th class=" text-xs  p-2 font-medium">
                                Min price
                            </th>
                            <th class=" text-xs  p-2 font-medium">
                                Max price
                            </th>
                            <th class=" text-xs  p-2 font-medium">
                                Average price
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($category_statistical as $statistical) {
                            extract($statistical);
                            $price = 0;
                            $avg_price = number_format($avg_price, 2, '.', ',');
                            if ($min_price == 0 || $max_price == 0 || $avg_price == 0) {
                                $min_price = $price;
                                $max_price  = $price;
                                $avg_price  = $price;
                            }
                            echo ' <tr class="border-t-2 border-dashed">
                              <td class="px-2 w-20 ">
                                  <p class="text-xs text-gray-900 ">
                                        ' . $category_id . '
                                  </p>
                              </td>
                              <td class="px-2 whitespace-nowrap">
                                  <p class="text-xs text-gray-900 w-32 truncate overflow-hidden">
                                        ' . $category_name . '
                                  </p>
                              </td>
                              <td class="px-2 whitespace-nowrap">
                                  <p class="text-xs text-gray-900">
                                        $' . $count_product . '
                                  </p>
                              </td>

                              <td class="px-2 whitespace-nowrap">
                                  <p class="text-xs text-gray-900">
                                        $' . $min_price . '
                                  </p>
                              </td>
                              <td class="px-2 whitespace-nowrap">
                                  <p class="text-xs text-gray-900">
                                        $' . $max_price . '
                                  </p>
                              </td>
                              <td class="px-2 whitespace-nowrap">
                                  <p class="text-xs text-gray-900">
                                        $' . $avg_price . '
                                  </p>
                          </tr>
                      ';
                        }
                        ?>

                    </tbody>
                </table>
                <div id="piechart">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {
                            packages: ['corechart']
                        })
                        google.charts.setOnLoadCallback(drawChart)

                        function drawChart() {

                            var data = google.visualization.arrayToDataTable([
                                ['Category', 'Quantity'],

                                <?php
                                $total_category = count($category_statistical);
                                $i = 0;
                                foreach ($category_statistical as $statistical) {
                                    extract($statistical);

                                    if ($i == $total_category) {
                                        $parse = "";
                                    } else {
                                        $parse = ",";
                                    }
                                    echo "['" . $statistical['category_name'] . "'," . $statistical['count_product'] . "]" . $parse;
                                    $i++;
                                }
                                ?>
                            ])

                            var options = {
                                title: 'Statistical categories',
                                width: 450,
                                height: 250,
                            }
                            var chart = new google.visualization.PieChart(
                                document.getElementById('piechart')
                            )
                            chart.draw(data, options)
                        }
                    </script>
                </div>
            </div>
        </section>
    </main>