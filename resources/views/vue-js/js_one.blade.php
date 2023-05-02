<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue-JS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="my_background">
    <div class="box">
        <p>Hello I am test text!</p>
    </div>
    <button type="button" onclick="Send()">Send</button>
    <div>
        <?php
        $array = ['one', 100, true];
        $objArray = [
            'two' => 2,
            'three' => 200,
            'four' => false
        ];

        foreach($array as $arr){
            echo $arr . '<br>';
        }

        foreach($objArray as $key => $value) {
            echo $key . $value . '<br>';
        }

        for ($i=0; $i < 10; $i++){
            echo $i . '<br>';
        }
        ?>
    </div>
    <div id="app">
{{--        <test-component></test-component>--}}
{{--        <test-two-component></test-two-component>--}}
        <c-r-u-d-component></c-r-u-d-component>
    </div>
    <div>
        <h1>Not VUE</h1>
    </div>

</body>
</html>
{{--<script>--}}
{{--    // import TestComponent from "@/components/TestComponent";--}}
{{--    let $myTest = document.querySelector('.box');--}}
{{--    console.log($myTest);--}}

{{--    function Send(){--}}
{{--        $myTest.remove();--}}
{{--        alert('Send');--}}
{{--    }--}}

{{--    let arrayObj = {--}}
{{--        'name': 'Ivan',--}}
{{--        'age': 27,--}}
{{--        sayFamily: function() {--}}
{{--            console.log('Markiz')--}}
{{--        }--}}
{{--    }--}}
{{--    arrayObj.sayFamily();--}}
{{--    export default {--}}
{{--        components: {TestComponent}--}}
{{--    }--}}
{{--</script>--}}
{{--<script>--}}
{{--    // alert('Hello World')--}}

{{--    let one = 'one';--}}
{{--    const someBool = true;--}}

{{--    console.log(one);--}}
{{--    let array = ['one', 100, true]--}}
{{--    console.log(array);--}}
{{--    let objArray = {--}}
{{--        'two': 2,--}}
{{--        'three': 200,--}}
{{--        'four': false--}}
{{--    }--}}
{{--    console.log(objArray);--}}
{{--    function someFunc() {--}}
{{--        return 'some function'--}}
{{--    }--}}
{{--    console.log(someFunc());--}}

{{--    if (!someBool) {--}}
{{--        console.log('true')--}}
{{--    } else {--}}
{{--        console.log('false')--}}
{{--    }--}}

{{--    let person = someBool ? 'Ivan' : 'Ne Ivan';--}}
{{--    console.log(person)--}}

{{--    array.forEach(function (item, index) {--}}
{{--        console.log(item, index);--}}
{{--    })--}}

{{--    for (let arr in objArray){--}}
{{--        console.log(objArray[arr])--}}
{{--    }--}}

{{--    Object.entries(objArray).forEach(function (item) {--}}
{{--        console.log(item);--}}
{{--    })--}}

{{--    console.log(objArray);--}}
{{--    console.log(array);--}}
{{--</script>--}}


