<html>
<head>
    <title></title>

    <!-- Ignite UI Required Combined CSS Files -->
    <link href="http://cdn-na.infragistics.com/igniteui/2018.1/latest/css/themes/infragistics/infragistics.theme.css" rel="stylesheet" />
    <link href="http://cdn-na.infragistics.com/igniteui/2018.1/latest/css/structure/infragistics.css" rel="stylesheet" />

    <script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.8.3.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

    <!-- Ignite UI Required Combined JavaScript Files -->
    <script src="http://cdn-na.infragistics.com/igniteui/2018.1/latest/js/infragistics.core.js"></script>
    <script src="http://cdn-na.infragistics.com/igniteui/2018.1/latest/js/infragistics.lob.js"></script>

</head>
<body>
    <style>        
        .combo-label {margin-bottom:.5em;}
    </style>
    <div class=".ui-widget-overlay"></div>
    <h4 class="combo-label">- Single Selection, opens drop down on focus</h4>
     <div id="checkboxSelectCombo"></div>

    <script>

        var colors = [
            { Name: "jQuery/HTML5/ASP.NET MVC Controls" },
            { Name: "ASP.NET Controls" },
            { Name: "Windows Forms Controls" },
            { Name: "WPF Controls" },
            { Name: "Android Native mobile controls" },
            { Name: "iOS Controls" },
            { Name: "SharePlus" },
            { Name: "ReportPlus" },
            { Name: "Indigo Studio" }
            
        ];

        $(function () {

            $("#singleSelectCombo").igCombo({
                width: 300,
                dataSource: colors,
                textKey: "Name",
                valueKey: "Name",
                dropDownOnFocus: true,
                dropDownOrientation: "bottom"
            });

            $("#multiSelectCombo").igCombo({
                width: 300,
                dataSource: colors,
                textKey: "Name",
                valueKey: "Name",
                multiSelection: {
                    enabled: true
                },
                dropDownOrientation: "bottom"
            });

            $("#checkboxSelectCombo").igCombo({
                width: 300,
                dataSource: colors,
                textKey: "Name",
                valueKey: "Name",
                multiSelection: {
                    enabled: true,
                    showCheckboxes: true
                },
                dropDownOrientation: "bottom"
            });

        });

    </script>

</body>
</html>