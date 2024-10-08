@extends('doctor.layout.index')
@section('content')
    <style>
        th {
            cursor: pointer;
            position: relative;
            text-align: center;
            /* font-size: 15px;
                    font-family: "Montserrat", sans-serif; */
        }

        th:hover {
            /* background-color: #f5f5f5; */
            background-color: #e9f6ff;
        }

        .icon {
            display: block;
            margin-top: 5px;
            text-align: center;
            cursor: pointer;
            transition: color 0.3s;
            font-size: 12px;
        }

        .icon.hide {
            display: none;
        }

        /* Đổi màu sắc biểu tượng */
        th .icon {
            transition: color 0.3s ease;
        }

        /* Chuyển đổi màu sắc và làm nhấp nháy biểu tượng khi rê chuột vào */
        @keyframes pulsate {
            0% {
                color: violet;
            }

            14% {
                color: indigo;
            }

            28% {
                color: blue;
            }

            42% {
                color: green;
            }

            57% {
                color: yellow;
            }

            71% {
                color: orange;
            }

            85% {
                color: red;
            }

            100% {
                color: violet;
            }
        }

        th:hover .icon {
            animation: pulsate 1s infinite;
            cursor: pointer;
        }
    </style>


    <script>
        var activeColumnIndexes = [];
        var filterValues = {};

        function toggleFilter(columnIndex) {
            var input = document.getElementById("filterInput" + columnIndex);
            var icon = document.getElementById("icon" + columnIndex);

            if (!input) {
                // Tạo ô lọc mới nếu không tồn tại
                var th = document.getElementsByClassName("filterable")[columnIndex];
                var filterInput = document.createElement("input");
                filterInput.setAttribute("type", "text");
                filterInput.setAttribute("id", "filterInput" + columnIndex);
                filterInput.setAttribute("placeholder", "Lọc theo " + th.innerHTML);
                filterInput.setAttribute("data-column-index", columnIndex.toString());
                filterInput.addEventListener("keyup", function() {
                    filterTable(columnIndex);
                });

                // Điền giá trị lọc vào ô đầu vào nếu nó tồn tại
                if (filterValues[columnIndex]) {
                    filterInput.value = filterValues[columnIndex];
                }

                th.appendChild(filterInput);
                filterInput.focus();
                icon.classList.add("hide");
                activeColumnIndexes.push(columnIndex);
            } else {
                // Đóng ô lọc nếu đã tồn tại

                // Lưu giá trị lọc trước khi xóa trường nhập liệu
                filterValues[columnIndex] = input.value;

                input.remove();
                icon.classList.remove("hide");
                var indexToRemove = activeColumnIndexes.indexOf(columnIndex);
                if (indexToRemove !== -1) {
                    activeColumnIndexes.splice(indexToRemove, 1);
                }
            }
        }


        function filterTable(columnIndex) {
            var filterInputs = document.querySelectorAll('[id^="filterInput"]');
            var table = document.getElementById("example2");
            var tr = table.getElementsByTagName("tr");

            for (var i = 0; i < tr.length; i++) {
                var shouldDisplay = true;
                for (var j = 0; j < filterInputs.length; j++) {
                    var input = filterInputs[j];
                    var columnIndex = parseInt(input.dataset.columnIndex, 10);
                    var filter = input.value.toUpperCase();
                    var td = tr[i].getElementsByTagName("td")[columnIndex];

                    if (td) {
                        var cellValue = td.innerHTML.toUpperCase();
                        if (cellValue.indexOf(filter) === -1) {
                            shouldDisplay = false;
                            break;
                        }
                    }
                }
                tr[i].style.display = shouldDisplay ? "" : "none";
            }
        }
    </script>


    <body class="hold-transition sidebar-mini">
        <div class="content-wrapper">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Liệt kê đơn thuốc</h3>
                </div>
                <!-- /.card-header -->

                <form class="form-horizontal" method="POST">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="filterable" onclick="toggleFilter(0)">Mã đơn thuốc
                                    <span class="fas fa-filter icon" id="icon0"></span>
                                </th>
                                <th class="filterable" onclick="toggleFilter(1)">Bác sĩ khám
                                    <span class="fas fa-filter icon" id="icon1"></span>
                                </th>
                                <th class="filterable" onclick="toggleFilter(2)">Tên bệnh nhân
                                    <span class="fas fa-filter icon" id="icon2"></span>
                                </th>
                                <th class="filterable" onclick="toggleFilter(3)">Ngày khám
                                    <span class="fas fa-filter icon" id="icon3"></span>
                                </th>
                                <th class="filterable" onclick="toggleFilter(4)">Chẩn đoán
                                    <span class="fas fa-filter icon" id="icon4"></span>
                                </th>
                                <th class="filterable" onclick="toggleFilter(5)">Hẹn tái khám
                                    <span class="fas fa-filter icon" id="icon5"></span>
                                </th>
                                <th class="filterable" onclick="toggleFilter(6)">Tổng tiền
                                    <span class="fas fa-filter icon" id="icon6"></span>
                                </th>
                                <th onclick="toggleFilter(7)">Thuốc
                                    <span class="fas fa-filter icon" id="icon7"></span>
                                </th>
                                <th class="filterable" onclick="toggleFilter(8)">Đơn vị
                                    <span class="fas fa-filter icon" id="icon8"></span>
                                </th>
                                <th class="filterable" onclick="toggleFilter(9)">Số lượng
                                    <span class="fas fa-filter icon" id="icon9"></span>
                                </th>
                                <th class="filterable" onclick="toggleFilter(10)">Đơn giá
                                    <span class="fas fa-filter icon" id="icon10"></span>
                                </th>
                                <th class="filterable" onclick="toggleFilter(11)">Cách dùng
                                    <span class="fas fa-filter icon" id="icon11"></span>
                                </th>
                                <th class="filterable" onclick="toggleFilter(12)">Thành tiền
                                    <span class="fas fa-filter icon" id="icon12"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prescriptions as $index => $prescription)
                                <tr>
                                    <td style="width:6%">{{ $prescription->id }}</td>
                                    <td>{{ $prescription->ten_doctor }}</td>
                                    <td>{{ $prescription->ten_bn }}</td>
                                    <td style="width:8%">{{ $prescription->ngaykham }}</td>
                                    <td style="width:8%">{{ $prescription->chandoan }}</td>
                                    <td style="width:9%">{{ $prescription->hentaikham }}</td>
                                    <td>{{ $prescription->tongtien }}</td>
                                    <td>
                                        @foreach ($prescription->medicines as $medicine)
                                            {{ $medicine->tenthuoc }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($prescription->medicines as $medicine)
                                            {{ $medicine->donvi }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($prescription->medicines as $medicine)
                                            {{ $medicine->soluong }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($prescription->medicines as $medicine)
                                            {{ $medicine->gia }}<br>
                                        @endforeach
                                    </td>
                                    <td style="width:12%">
                                        @foreach ($prescription->medicines as $medicine)
                                            {{ $medicine->cachdung }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($prescription->medicines as $medicine)
                                            {{ $medicine->thanhtien }}<br>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>

            </div>
        </div>

    </body>
@endsection
