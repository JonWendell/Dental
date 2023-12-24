@extends('back.layout.ecom-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'About')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - eMed</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .content {
            display: flex;
            align-items: center;
            justify-content: space-around;
            margin: 50px 0;
            margin-top: 2px;
            margin-bottom: 3px;
        }

        .container-fluid {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }

        .col-12 {
            flex: 5;
            padding: 20px;
        }

        .col-12 img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .about-text {
            font-size: 16px;
            line-height: 1.5;
        }

        h1 {
            color: #008080;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <img src="/back/vendors/images/medicines-l.webp" alt="Pharmacy Image">
            </div>
            <div class="col-12">
                <h1>Welcome to eMed - Your Trusted Pharmacy</h1>
                <p class="about-text">
                    At eMed, our commitment extends beyond providing healthcare services and products – it's about fostering
                    a seamless experience for your well-being. Our team of experienced pharmacists is dedicated to ensuring
                    you receive the highest standard of care for all your health needs.
                </p>
                <p class="about-text">
                    Whether you require prescription fulfillment, health consultations, or access to a diverse range of healthcare
                    products, eMed stands ready to serve you. We are more than a pharmacy; we are your dedicated partner on
                    your journey to optimal health.
                </p>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <h1>RxCue Pharmacy – Redefining Your Health, Beauty, and Well-Being Experience.</h1>
                <p class="about-text">
                    With an extensive network of over 399 branches strategically located across the nation,
                    RxCue Pharmacy stands as a prominent leader in the pharmaceutical retail landscape of the
                    Philippines. We take pride in facilitating easy access to premium health and beauty products,
                    striving to enhance the overall well-being of our valued customers.
                </p>
                <p class="about-text">
                    In a landmark collaboration, RxCue Pharmacy proudly joined forces with Robinsons Retail Holdings
                    Inc. (RRHI) in October 2020. This strategic partnership, coupled with our unwavering commitment
                    to delivering an unparalleled health and beauty shopping experience, has propelled RxCue Pharmacy
                    to new heights. We go beyond conventional limits to cater to our customers, offering services
                    that extend to their doorstep through RosExpress Delivery, nationwide access via the Rose Pharmacy
                    Online Store, and the convenience of round-the-clock service with our 24-Hour stores.
                </p>
                <p class="about-text">
                    Driven by a dedication to provide value, RxCue Pharmacy introduces the Rose Pharmacy Generics line,
                    ensuring the widespread availability of high-quality prescription and over-the-counter medicines
                    at affordable prices. Our Guardian line of personal care products extends gentle, quality care to
                    every member of your family, consistently maintaining budget-friendly prices. Explore additional
                    savings through our monthly Hot Deals, SuperSavers, Buy More Save More promotions, and exclusive
                    special offers, providing exceptional value whether you choose to shop in-store or online.
                </p>
                <p class="about-text">
                    At RxCue Pharmacy, we are not just a pharmacy; we are a trusted partner in your journey toward
                    holistic well-being. Our mission is to redefine your health and beauty experience by combining
                    quality products, accessibility, and a touch of passionate care. Thank you for choosing RxCue Pharmacy,
                    where your health and happiness take center stage.
                </p>
            </div>
        </div>
    </div>

</body>

</html>

@endsection
