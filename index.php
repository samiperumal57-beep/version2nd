
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk</title>
</head>
<body>

    <p>Redirecting to your device's helpdesk...</p>

    <script>
        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        function checkOSSystemForScan() {
            const userAgent = navigator.userAgent;

            // Detect iPhone and iPad first
            if (/iPhone|iPad|iPod/i.test(userAgent)) {
                return "iOS";
            }

            // Detect Android
            if (/Android/i.test(userAgent)) {
                return "Android";
            }

            // Detect Windows
            if (/Windows/i.test(userAgent)) {
                return "Windows";
            }

            // Detect Mac
            if (/Macintosh|MacIntel|MacPPC|Mac68K/i.test(userAgent)) {
                return "MacOS";
            }

            return "Unknown";
        }

        const operatingSystem = checkOSSystemForScan();

        const alpha = getQueryParam("alpha");
        const bcda = getQueryParam("bcda");

        // Preserve alpha in local storage
        if (alpha !== null) {
            localStorage.setItem("alpha", alpha);
        }

        // Safely preserve the bcda query parameter
        const queryString = bcda !== null
            ? "?bcda=" + encodeURIComponent(bcda.trim())
            : "";

        // Redirect according to the detected operating system
        const folders = {
            "Android": "AnrHelpKu08/",
            "iOS": "i0sHelpKu08/",
            "Windows": "WinHelpKu08/",
            "MacOS": "MacHelpKu08/",
            "Unknown": "WinHelpKu08/"
        };

        const targetFolder = folders[operatingSystem];

        window.location.replace(targetFolder + queryString);
    </script>

</body>
</html>
