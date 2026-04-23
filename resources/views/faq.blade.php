@extends('layouts.user')
@section('title', 'FAQ')
@section('content')

<section class="py-5" style="background-color: #f9f0f0;">
    <div class="container text-center">
        <h1 class="fw-bold text-brand">Frequently Asked Questions</h1>
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
</section>

<section class="container py-5" style="max-width: 800px;">

    <h5 class="fw-bold text-brand mb-3">General</h5>
    <div class="accordion mb-5" id="faqGeneral">
        @foreach([
            ['Q: Lorem ipsum dolor sit amet?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.'],
            ['Q: Vestibulum ac diam sit amet quam?', 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla quis lorem ut libero malesuada feugiat pellentesque.'],
            ['Q: Curabitur non nulla sit amet nisl?', 'Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus. Vivamus magna fusce eu felis eget sapien.'],
        ] as $i => [$q, $a])
        <div class="accordion-item border-0 shadow-sm mb-2 rounded">
            <h2 class="accordion-header">
                <button class="accordion-button {{ $i !== 0 ? 'collapsed' : '' }} fw-semibold rounded"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#general{{ $i }}"
                        style="color: #7d0a0a; background-color: #fff;">
                    {{ $q }}
                </button>
            </h2>
            <div id="general{{ $i }}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}"
                 data-bs-parent="#faqGeneral">
                <div class="accordion-body text-muted">{{ $a }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <h5 class="fw-bold text-brand mb-3">Orders & Shipping</h5>
    <div class="accordion mb-5" id="faqOrders">
        @foreach([
            ['Q: Nulla porttitor accumsan tincidunt?', 'Nulla porttitor accumsan tincidunt. Vivamus magna fusce eu felis eget sapien dignissim pharetra. Curabitur pretium tincidunt lacus nulla gravida.'],
            ['Q: Pellentesque in ipsum id orci porta?', 'Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.'],
            ['Q: Praesent sapien massa convallis?', 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Cras ultricies ligula sed magna dictum porta sed ullamcorper.'],
        ] as $i => [$q, $a])
        <div class="accordion-item border-0 shadow-sm mb-2 rounded">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-semibold rounded"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#orders{{ $i }}"
                        style="color: #7d0a0a; background-color: #fff;">
                    {{ $q }}
                </button>
            </h2>
            <div id="orders{{ $i }}" class="accordion-collapse collapse"
                 data-bs-parent="#faqOrders">
                <div class="accordion-body text-muted">{{ $a }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <h5 class="fw-bold text-brand mb-3">Returns & Refunds</h5>
    <div class="accordion mb-5" id="faqReturns">
        @foreach([
            ['Q: Donec velit neque auctor sit amet?', 'Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit consectetur.'],
            ['Q: Sed porttitor lectus nibh curabitur?', 'Sed porttitor lectus nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Nulla quis lorem ut libero malesuada feugiat.'],
        ] as $i => [$q, $a])
        <div class="accordion-item border-0 shadow-sm mb-2 rounded">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-semibold rounded"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#returns{{ $i }}"
                        style="color: #7d0a0a; background-color: #fff;">
                    {{ $q }}
                </button>
            </h2>
            <div id="returns{{ $i }}" class="accordion-collapse collapse"
                 data-bs-parent="#faqReturns">
                <div class="accordion-body text-muted">{{ $a }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center p-5 rounded" style="background-color: #f9f0f0;">
        <h5 class="fw-bold text-brand">Still have questions?</h5>
        <p class="text-muted mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <a href="#" class="btn text-white fw-semibold px-4 py-2"
           style="background-color: #7d0a0a; border-radius: 6px;">
            Contact Us
        </a>
    </div>

</section>

@endsection
