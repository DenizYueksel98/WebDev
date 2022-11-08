<script type="text/javascript" src="../../js/display_table.js"></script>

<section class="filter-form" onLoad="buildHtmlTable('#carDataTable', <?php echo json_encode($this->carModel); ?>)">
    <form id="filter-form" action="" method="post">
        <div class="input-container-nearly-full">
            <div class="inline">
                <label for="filter">Filter:</label>
                <select class="input-filter" name="filter" id="filter">
                    <option value="id">ID</option>
                    <option selected value="name">Fahrzeugname</option>
                    <option value="b21">B2.1 lt. Zulassungsbescheinigung Teil 1</option>
                    <option value="b22">B2.2 lt. Zulassungsbescheinigung Teil 1</option>
                    <option value="j">J lt. Zulassungsbescheinigung Teil 1</option>
                    <option value="vier">4 lt. Zulassungsbescheinigung Teil 1</option>
                    <option value="d1">D1 lt. Zulassungsbescheinigung Teil 1</option>
                    <option value="d2">D2 lt. Zulassungsbescheinigung Teil 1</option>
                    <option value="zwei">2 lt. Zulassungsbescheinigung Teil 1</option>
                    <option value="fuenf">5 lt. Zulassungsbescheinigung Teil 1</option>
                    <option value="v9">V9 lt. Zulassungsbescheinigung Teil 1</option>
                    <option value="vierzehn">14 lt. Zulassungsbescheinigung Teil 1</option>
                    <option value="p3">P3 lt. Zulassungsbescheinigung Teil 1</option>
                    <option value="verbin">Verbrauch innerorts lt. NEFZ</option>
                    <option value="verbau">Verbrauch außerorts lt. NEFZ</option>
                    <option value="verbko">Verbrauch kombiniert lt. NEFZ</option>
                    <option value="co2kom">CO2-Emission kombiniert lt. NEFZ</option>
                    <option value="sehrs">Sehr schnell lt. WLTP</option>
                    <option value="schnell">Schnell lt. WLTP</option>
                    <option value="langsam">Langsam lt. WLTP</option>
                    <option value="co2komb">CO2-Emission kombiniert lt. WLTP</option>
                </select>
                <label for="theta">Vergleichsoperator:</label>
                <select class="input-filter" name="theta" id="theta">
                    <option value="=">
                        =
                    </option>
                    <option value="<">
                        < </option>
                    <option value=">">
                        >
                    </option>
                    <option value="<=">
                        <= </option>
                    <option value=">=">
                        >=
                    </option>
                    <option value="<>">
                        <>
                    </option>
                    <option selected value="LIKE">
                        enthält
                    </option>
                </select>
                <label for="value">Wert:</label>
                <input class="input-filter" name="value" id="value" placeholder=" " onkeyup="updateCarModel(this.value)" />
            </div>
        </div>
        <a id="resultcount"></a>
    </form>
</section>
<section class="table">
    <table id="carDataTable">
    </table>

    <script type="text/javascript">
        var carModel = <?php echo $this->json ?>;
        console.log(carModel);
    </script>
</section>