@extends('layouts.app')

@section('title', 'Agent')

@section('content')
<section class="coverage-breadcrumb-hero">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1>Agent Referral Portal</h1>
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>Agent Referral Portal</span>
            </div>
        </div>
    </div>
</section>


<div class="portal-outer-wrapper reveal">
    <div class="portal-inner-card">
        <img src="{{ asset('images/agent-1.jpg') }}" class="agent-hero-image" alt="Agent Portal">

        <div class="form-content-side">
            <div class="agent-header-box">
                <div class="program-badge">AGENT PROGRAM</div>
                <div style="font-size: 38px; font-family: 'Helvetica Black'; line-height: 40px;">Generate Referral Links</div>
                <div style="width: 485px; font-size: 16px; font-family: 'Poppins';">Empowering you to source and sell high-quality Chinese vehicles with ease.</div>
            </div>

            <div class="agent-form-body">
                <div class="input-container">
                    <div>
                        <label style="font-weight: 600; margin-bottom: 10px; display: block;">Enter Your Agent Name (No spaces)</label>
                        <div class="styled-input-group">
                            <input type="text" id="agentName" class="styled-input" placeholder="e.g JoeDoe">
                        </div>
                    </div>

                    <div>
                        <label style="font-weight: 600; margin-bottom: 10px; display: block;">Select your Vehicle</label>
                        <div class="styled-input-group">
                            <select id="vehicleSlug" class="styled-select">
                                <option value="">--Click to choose a car--</option>
                                @foreach($vehicles as $vehicle)
                                    <option value="{{ $vehicle['slug'] ?? \Illuminate\Support\Str::slug($vehicle['name']) }}">
                                        {{ $vehicle['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button onclick="generateLink()" class="btn-generate-yellow">GENERATE MY LINK</button>
                </div>

                <div style="align-self: stretch;">
                    <label style="font-weight: 600; margin-bottom: 10px; display: block;">Your Unique Referral Link:</label>
                    <div style="display: flex; justify-content: space-between;">
                        <input type="text" id="finalLink" class="styled-input" style="width: 380px; padding: 10px; background: #F5F5F5; border-radius: 10px; border: 1px solid #464646;" readonly>
                        <button onclick="copyLink()" id="copyBtn" class="btn-copy-green">Copy Link</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function generateLink() {
        const nameInput = document.getElementById('agentName').value.trim();
        const name = nameInput.replace(/\s+/g, '_'); 
        const slug = document.getElementById('vehicleSlug').value;
        const resultArea = document.getElementById('resultArea');
        const finalLinkInput = document.getElementById('finalLink');

        if (name && slug) {
            const fullURL = `${window.location.origin}/vehicles/${slug}?ref=${name}`;
            finalLinkInput.value = fullURL;
            resultArea.classList.remove('d-none');
        } else {
            alert("Please complete all fields.");
        }
    }

    function copyLink() {
        const copyText = document.getElementById("finalLink");
        copyText.select();
        navigator.clipboard.writeText(copyText.value);
        document.getElementById('copyBtn').innerText = "Copied!";
        setTimeout(() => { document.getElementById('copyBtn').innerText = "Copy Link"; }, 2000);
    }
</script>

@endsection