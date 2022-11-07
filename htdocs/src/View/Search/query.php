We found <?php if (isset($this->searchResultContains)) {
                echo count($this->searchResultContains);
            } else {
                echo "0";
            } ?> matching items containing your query '<?php echo $this->searchQuery; ?>'
<section class="table">
    <table id="carDataTable">
    </table>

    <script type="text/javascript">
        var carModel =<?php echo json_encode($this->searchResultContains)?>;
        function buildHtmlTable(selector) {
            var columns = addAllColumnHeaders(carModel, selector);
            for (var i = 0; i < carModel.length; i++) {
                var row$ = $('<tr/>');
                for (var colIndex = 0; colIndex < columns.length; colIndex++) {
                    var cellValue = carModel[i][columns[colIndex]];
                    if (cellValue == null) cellValue = "";
                    row$.append($('<td/>').html(cellValue));
                }
                $(selector).append(row$);
            }
        }

        // Adds a header row to the table and returns the set of columns.
        // Need to do union of keys from all records as some records may not contain
        // all records.
        function addAllColumnHeaders(carModel, selector) {
            var columnSet = [];
            var headerTr$ = $('<tr/>');
            for (var i = 0; i < carModel.length; i++) {
                var rowHash = carModel[i];
                for (var key in rowHash) {
                    if ($.inArray(key, columnSet) == -1) {
                        columnSet.push((key));
                        headerTr$.append($('<th/>').html(key));
                    }
                }
            }
            $(selector).append(headerTr$);
            return columnSet;
        }
    </script>
    <!--script type="text/javascript" src="../../../js/display_table.js"></script-->
</section>