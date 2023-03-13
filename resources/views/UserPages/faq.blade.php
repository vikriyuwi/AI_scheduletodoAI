@extends('UserPages.template')

@section('main-content')
<section>
    <div class="container pb-5">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card rounded-5 border-0">
                    <div class="card-body p-md-5">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="fw-bold text-primary">Frequently Asked Question</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                                What is <strong class="text-primary ms-2">Srgepp</strong>?
                                            </button>
                                        </h2>
                                        <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong class="text-primary">Srgepp</strong> is a platform that utilizes artificial intelligence algorithms to help you manage your daily tasks and to-do lists in a more efficient way. The AI-powered features may include suggestions and prioritizations recommendations based on your usage patterns.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                                How do I sign up for <strong class="text-primary ms-2">Srgepp</strong>?
                                            </button>
                                        </h2>
                                        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                To sign up for <strong class="text-primary">Srgepp</strong>, you need to visit the website and click on the sign-in button. You will be prompted to sign up with your Google account for a faster and more convenient login process.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                                How does the AI algorithm prioritize my tasks on <strong class="text-primary ms-2">Srgepp</strong>?
                                            </button>
                                        </h2>
                                        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong class="text-primary">Srgepp</strong> may prioritize your tasks based on various factors such as due dates, difficulty level and count of step(s). And AI will give you recommendations priority todo using K-Means Clustering.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                                How do I create a task on <strong class="text-primary ms-2">Srgepp</strong>?
                                            </button>
                                        </h2>
                                        <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                To create a task on <strong class="text-primary">Srgepp</strong>, you need to click on the “add todo" button on manage todo page and enter the detail of your todo. You can also add notes or link attachments to the task. The AI algorithms may suggest additional details or actions based on the task difficulty level and count of the step(s).
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                                How secure is my data on <strong class="text-primary ms-2">Srgepp</strong>?
                                            </button>
                                        </h2>
                                        <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong class="text-primary">Srgepp</strong> using AI takes the security and privacy of your data very seriously. The website uses industry-standard encryption protocols and secure storage systems to protect your personal information and task data.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                                Can I access the <strong class="text-primary mx-2">Srgepp</strong> on my mobile device?
                                            </button>
                                        </h2>
                                        <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                We are currently working on mobile application development. But you can still acces <strong class="text-primary">Srgepp</strong> on various devices and platforms via website.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                                How can I provide feedback or report issues with <strong class="text-primary ms-2">Srgepp</strong>?
                                            </button>
                                        </h2>
                                        <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                If you have any feedback or issues with <strong class="text-primary">Srgepp</strong>, you can contact the support team through the website's contact form or email address (<strong class="text-primary ms-2">srgepp</strong>@fikriyuwi.com). The team will try their best to respond to your inquiries and resolve any problems as soon as possible. You can also submit feature requests or suggestions for improving the website's functionality and usability.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection