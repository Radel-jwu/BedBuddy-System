<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Subscription Plans</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    html, body { font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji"; }
    .glow { box-shadow: 0 0 0 4px rgba(59,130,246,.15); }
  </style>
</head>
<body class="bg-slate-50 text-slate-800">
  <!-- Header -->
  <x-navbar>
  </x-navbar>

  <!-- Hero -->
  <section class="max-w-6xl mx-auto px-6 pb-2">
    <div class=" mt-10 rounded-3xl bg-gradient-to-br from-white to-slate-100 p-8 md:p-12 ring-1 ring-slate-200">
      <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight text-slate-900">Simple pricing for every team</h1>
      <p class="mt-3 md:mt-4 text-slate-600 max-w-2xl">Choose a plan that grows with you. Switch between monthly and yearly billing anytime. No hidden fees.</p>

      <!-- Billing Toggle -->
      <div class="mt-6 flex items-center gap-4">
        <span class="text-sm font-medium text-slate-600">Bill monthly</span>
        <button id="billingToggle" type="button" class="relative inline-flex h-8 w-16 items-center rounded-full bg-slate-200 transition">
          <span id="toggleDot" class="inline-block h-6 w-6 translate-x-1 rounded-full bg-white shadow ring-1 ring-slate-300 transition"></span>
        </button>
        <div class="flex items-center gap-2">
          <span class="text-sm font-medium text-slate-600">Bill yearly</span>
          <span class="text-xs px-2 py-1 rounded-full bg-emerald-100 text-emerald-700">Save 20%</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Plans -->
  <section class="max-w-6xl mx-auto px-6 py-10">
    <div class="grid md:grid-cols-3 gap-6">
      <!-- Plan Card Component Template duplicated for tiers -->
      <div class="plan card rounded-3xl ring-1 ring-slate-200 bg-white p-7 flex flex-col" data-plan="Starter" data-monthly="399" data-yearly="319">
        <div class="flex items-center justify-between">
          <h3 class="text-xl font-bold">Starter</h3>
          <span class="text-xs font-semibold px-2 py-1 rounded-full bg-slate-100 text-slate-700">For individuals</span>
        </div>
        <p class="mt-2 text-slate-600">All the basics to start accepting bookings.</p>
        <div class="mt-6 flex items-baseline gap-1">
          <span class="currency text-3xl font-extrabold">₱</span>
          <span class="price text-5xl font-extrabold tracking-tight">399</span>
          <span class="text-slate-500">/ <span class="cycle">mo</span></span>
        </div>
        <ul class="mt-6 space-y-3 text-sm">
          <li class="flex gap-3"><svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg> 1 listing live</li>
          <li class="flex gap-3"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg> Basic analytics</li>
          <li class="flex gap-3"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg> Email support</li>
        </ul>
        <button class="subscribe mt-6 w-full rounded-2xl bg-slate-900 text-white py-3 font-semibold hover:bg-slate-800 transition" data-tier="Starter">Choose Starter</button>
      </div>

      <div class="plan card rounded-3xl ring-2 ring-indigo-300 bg-white p-7 flex flex-col relative overflow-hidden" data-plan="Pro" data-monthly="899" data-yearly="719">
        <div class="absolute -right-10 -top-10 h-24 w-24 rounded-full bg-indigo-100"></div>
        <div class="flex items-center justify-between">
          <h3 class="text-xl font-bold">Pro</h3>
          <span class="text-xs font-semibold px-2 py-1 rounded-full bg-indigo-100 text-indigo-700">Most popular</span>
        </div>
        <p class="mt-2 text-slate-600">Advanced tools for growing landlords and teams.</p>
        <div class="mt-6 flex items-baseline gap-1">
          <span class="currency text-3xl font-extrabold">₱</span>
          <span class="price text-5xl font-extrabold tracking-tight">899</span>
          <span class="text-slate-500">/ <span class="cycle">mo</span></span>
        </div>
        <ul class="mt-6 space-y-3 text-sm">
          <li class="flex gap-3"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg> 5 listings live</li>
          <li class="flex gap-3"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg> Priority support</li>
          <li class="flex gap-3"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg> Payouts & invoicing</li>
          <li class="flex gap-3"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg> Custom branding</li>
        </ul>
        <button class="subscribe mt-6 w-full rounded-2xl bg-indigo-600 text-white py-3 font-semibold hover:bg-indigo-500 transition shadow-lg shadow-indigo-200" data-tier="Pro">Start Pro</button>
      </div>

      <div class="plan card rounded-3xl ring-1 ring-slate-200 bg-white p-7 flex flex-col" data-plan="Business" data-monthly="1999" data-yearly="1599">
        <div class="flex items-center justify-between">
          <h3 class="text-xl font-bold">Business</h3>
          <span class="text-xs font-semibold px-2 py-1 rounded-full bg-slate-100 text-slate-700">For companies</span>
        </div>
        <p class="mt-2 text-slate-600">Everything you need for scale and compliance.</p>
        <div class="mt-6 flex items-baseline gap-1">
          <span class="currency text-3xl font-extrabold">₱</span>
          <span class="price text-5xl font-extrabold tracking-tight">1,999</span>
          <span class="text-slate-500">/ <span class="cycle">mo</span></span>
        </div>
        <ul class="mt-6 space-y-3 text-sm">
          <li class="flex gap-3"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg> Unlimited listings</li>
          <li class="flex gap-3"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg> SLA & phone support</li>
          <li class="flex gap-3"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg> SSO & roles</li>
          <li class="flex gap-3"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg> Audit logs & exports</li>
        </ul>
        <button class="subscribe mt-6 w-full rounded-2xl bg-slate-900 text-white py-3 font-semibold hover:bg-slate-800 transition" data-tier="Business">Talk to sales</button>
      </div>
    </div>

    <!-- Guarantee / safe badges -->
    <div class="mt-10 grid md:grid-cols-3 gap-4 text-sm text-slate-600">
      <div class="flex items-center gap-3"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> PCI-DSS compliant checkout</div>
      <div class="flex items-center gap-3"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 12l2 2 4-4"/></svg> 7‑day free trial on Pro</div>
      <div class="flex items-center gap-3"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12h18M3 6h18M3 18h18"/></svg> Cancel anytime</div>
    </div>
  </section>

  <!-- Payment Modal -->
  <div id="paymentModal" class="hidden fixed inset-0 z-[60]">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative mx-auto mt-24 w-[92%] max-w-xl">
      <div class="rounded-3xl bg-white ring-1 ring-slate-200 shadow-xl overflow-hidden">
        <div class="p-6 md:p-8">
          <div class="flex items-start justify-between">
            <div>
              <h3 class="text-xl font-bold">Complete your subscription</h3>
              <p id="modalPlanLabel" class="text-sm text-slate-600 mt-1">Pro — ₱899 / mo</p>
            </div>
            <button id="closeModal" class="p-2 text-slate-500 hover:text-slate-700" aria-label="Close">
              <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
          </div>

          <form class="mt-6 space-y-5" onsubmit="event.preventDefault(); alert('This is a demo. Connect your gateway here.');">
            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="text-sm font-medium text-slate-700">Full name</label>
                <input class="mt-1 w-full rounded-xl border border-slate-300 px-3 py-2 focus:outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500" placeholder="Juan Dela Cruz" required>
              </div>
              <div>
                <label class="text-sm font-medium text-slate-700">Email</label>
                <input type="email" class="mt-1 w-full rounded-xl border border-slate-300 px-3 py-2 focus:outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500" placeholder="you@example.com" required>
              </div>
            </div>

            <div>
              <label class="text-sm font-medium text-slate-700">Card number</label>
              <div class="mt-1 flex items-center rounded-xl border border-slate-300 px-3 py-2 focus-within:ring-4 focus-within:ring-indigo-100 focus-within:border-indigo-500">
                <input class="w-full outline-none" inputmode="numeric" autocomplete="cc-number" placeholder="4242 4242 4242 4242" required>
                <svg class="h-6 w-10" viewBox="0 0 48 24" fill="none"><rect width="48" height="24" rx="4" fill="#0ea5e9"/></svg>
              </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
              <div>
                <label class="text-sm font-medium text-slate-700">Expiry</label>
                <input class="mt-1 w-full rounded-xl border border-slate-300 px-3 py-2 focus:outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500" placeholder="MM/YY" required>
              </div>
              <div>
                <label class="text-sm font-medium text-slate-700">CVC</label>
                <input class="mt-1 w-full rounded-xl border border-slate-300 px-3 py-2 focus:outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500" placeholder="123" required>
              </div>
              <div>
                <label class="text-sm font-medium text-slate-700">ZIP/Postal</label>
                <input class="mt-1 w-full rounded-xl border border-slate-300 px-3 py-2 focus:outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500" placeholder="6000">
              </div>
            </div>

            <div class="rounded-2xl bg-slate-50 p-4 ring-1 ring-slate-200">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm text-slate-600">Plan</p>
                  <p id="summaryPlan" class="font-semibold">Pro</p>
                </div>
                <div class="text-right">
                  <p class="text-sm text-slate-600">Amount due</p>
                  <p id="summaryAmount" class="text-lg font-bold">₱899 / mo</p>
                </div>
              </div>
            </div>

            <button type="submit" id="payButton" class="w-full rounded-2xl bg-indigo-600 text-white py-3 font-semibold hover:bg-indigo-500 transition glow">Pay now</button>
            <p class="text-[13px] text-slate-500 text-center">By confirming your subscription, you agree to our <a href="#" class="underline">Terms</a> and <a href="#" class="underline">Privacy Policy</a>.</p>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="max-w-6xl mx-auto px-6 py-12 text-sm text-slate-500">
    <div class="border-t border-slate-200 pt-6 flex flex-col md:flex-row items-center justify-between gap-4">
      <p>© <span id="year"></span> BedBuddy. All rights reserved.</p>
      <div class="flex items-center gap-6">
        <a href="#" class="hover:text-slate-700">Docs</a>
        <a href="#" class="hover:text-slate-700">Support</a>
        <a href="#" class="hover:text-slate-700">Status</a>
      </div>
    </div>
  </footer>

  <script>
    // Helpers
    const peso = n => new Intl.NumberFormat('en-PH').format(n);

    const toggle = document.getElementById('billingToggle');
    const dot = document.getElementById('toggleDot');
    const plans = document.querySelectorAll('.plan');
    const modal = document.getElementById('paymentModal');
    const closeModal = document.getElementById('closeModal');
    const payBtn = document.getElementById('payButton');

    const modalPlanLabel = document.getElementById('modalPlanLabel');
    const summaryPlan = document.getElementById('summaryPlan');
    const summaryAmount = document.getElementById('summaryAmount');

    let yearly = false; // default monthly
    let activeTier = 'Pro';

    function refreshPrices() {
      plans.forEach(card => {
        const priceEl = card.querySelector('.price');
        const cycleEl = card.querySelector('.cycle');
        const monthly = parseInt(card.dataset.monthly, 10);
        const yearlyPrice = parseInt(card.dataset.yearly, 10);
        const val = yearly ? yearlyPrice : monthly;
        priceEl.textContent = peso(val);
        cycleEl.textContent = yearly ? 'yr' : 'mo';
      });
      updateSummary(activeTier);
    }

    function updateSummary(tier) {
      const card = Array.from(plans).find(p => p.dataset.plan === tier);
      if (!card) return;
      const amount = yearly ? parseInt(card.dataset.yearly,10) : parseInt(card.dataset.monthly,10);
      const cycle = yearly ? 'yr' : 'mo';
      modalPlanLabel.textContent = `${tier} — ₱${peso(amount)} / ${cycle}`;
      summaryPlan.textContent = tier + (yearly ? ' (yearly)' : '');
      summaryAmount.textContent = `₱${peso(amount)} / ${cycle}`;
    }

    toggle.addEventListener('click', () => {
      yearly = !yearly;
      dot.style.transform = yearly ? 'translateX(2.25rem)' : 'translateX(0.25rem)';
      refreshPrices();
    });

    document.querySelectorAll('.subscribe').forEach(btn => {
      btn.addEventListener('click', () => {
        activeTier = btn.dataset.tier;
        updateSummary(activeTier);
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
      });
    });

    closeModal.addEventListener('click', () => {
      modal.classList.add('hidden');
      document.body.classList.remove('overflow-hidden');
    });

    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
      }
    });

    document.getElementById('year').textContent = new Date().getFullYear();
    refreshPrices();
  </script>
</body>
</html>