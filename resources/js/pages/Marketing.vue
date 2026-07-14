<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import ModaBadge from '@/components/moda/ModaBadge.vue';
import ModaButton from '@/components/moda/ModaButton.vue';
import ModaFooter from '@/components/moda/ModaFooter.vue';
import ModaNav from '@/components/moda/ModaNav.vue';
import ModaProductCard from '@/components/moda/ModaProductCard.vue';

interface Listing {
    id: number;
    title: string;
    place: string;
    price: string;
    originalPrice?: string | null;
    size: string;
    inStock: boolean;
}

interface Category {
    name: string;
    emoji: string;
    description: string;
    count: number;
}

withDefaults(
    defineProps<{
        listings?: Listing[];
        categories?: Category[];
        featured?: Listing | null;
        amazonUrl?: string;
    }>(),
    {
        listings: () => [],
        categories: () => [],
        featured: null,
        amazonUrl: 'https://www.amazon.co.uk',
    },
);

const navLinks = [
    { label: 'Shop on Amazon', href: 'https://www.amazon.co.uk', external: true },
    { label: 'The Collection', href: '#collection' },
    { label: 'About', href: '#about' },
    { label: 'Contact', href: '#contact' },
];

const benefits: [string, string, string][] = [
    ['🖼️', 'DISPLAY YOUR WAY', 'Frame these iconic views in A4, A3, or A2 to suit any space — living rooms, hallways, offices, or coastal-themed interiors.'],
    ['🌊', 'PREMIUM 265GSM SATIN PAPER', 'Professionally printed on heavyweight satin-finish paper for exceptional colour accuracy.'],
    ['🇬🇧', 'MADE IN BRITAIN', 'Designed and printed in the UK using fade-resistant inks and premium materials.'],
    ['🎁', 'THE PERFECT GIFT', 'A slice of classic British splendour, gift-boxed and ready to hang.'],
];

const email = ref('');
const subscribed = ref(false);

function subscribe() {
    subscribed.value = true;
}
</script>

<template>
    <Head title="British Beauty Meets Italian Style" />

    <div :style="{ fontFamily: 'var(--font-body)', background: 'var(--surface-page)', minHeight: '100vh' }">
        <ModaNav :links="navLinks" :cart-count="0" />

        <!-- Hero -->
        <section
            style="
                position: relative;
                min-height: 520px;
                background:
                    linear-gradient(180deg, rgba(10, 10, 10, 0.15), rgba(10, 10, 10, 0.6)),
                    linear-gradient(160deg, #cfd9d6, #8fa3ab);
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                padding: 72px 28px;
                box-sizing: border-box;
            "
        >
            <div style="max-width: 680px">
                <div
                    style="
                        font: var(--font-eyebrow);
                        letter-spacing: 0.14em;
                        color: var(--it-green);
                        margin-bottom: 14px;
                    "
                >
                    🇬🇧 MADE IN BRITAIN · PRINTED WITH ITALIAN FLAIR
                </div>
                <h1
                    style="
                        font: var(--font-h1);
                        letter-spacing: var(--tracking-display);
                        color: var(--paper-0);
                        text-transform: uppercase;
                        margin: 0;
                    "
                >
                    British Beauty Meets Italian Style
                </h1>
                <p style="font: var(--font-body-md); color: var(--text-on-inverse-muted); margin-top: 16px">
                    Step into a world where timeless British landscapes meet a touch of Italian flair — premium
                    travel posters for your walls.
                </p>
                <div style="margin-top: 26px; display: flex; gap: 12px; justify-content: center; flex-wrap: wrap">
                    <ModaButton variant="primary" size="lg" as="a" href="#collection">Browse the collection</ModaButton>
                    <ModaButton variant="secondary" size="lg" as="a" :href="amazonUrl" target="_blank"
                        >Shop on Amazon</ModaButton
                    >
                </div>
            </div>
        </section>

        <!-- Featured poster + Amazon CTA -->
        <section v-if="featured" class="moda-featured">
            <div
                style="
                    aspect-ratio: 4 / 5;
                    border-radius: var(--radius-frame);
                    box-shadow: var(--shadow-inset-frame);
                    background: linear-gradient(160deg, var(--chalk), var(--coast-blue-100));
                    display: flex;
                    align-items: center;
                    justify-content: center;
                "
            >
                <span
                    style="
                        font-size: var(--text-xs);
                        color: var(--coast-blue-700);
                        background: rgba(255, 255, 255, 0.7);
                        padding: 6px 12px;
                        border-radius: 4px;
                    "
                    >{{ featured.place }}</span
                >
            </div>
            <div>
                <div style="font: var(--font-eyebrow); color: var(--it-green); letter-spacing: 0.1em">
                    🌊 WORLD-FAMOUS SUSSEX VIEW
                </div>
                <h2 style="font: var(--font-h2); color: var(--text-primary); margin: 10px 0 0">{{ featured.title }}</h2>
                <div style="font: var(--font-body-sm); color: var(--text-muted); margin-top: 6px">
                    {{ featured.place }} · A4 / A3 / A2
                </div>
                <p style="font: var(--font-body-md); color: var(--text-secondary); margin-top: 18px; max-width: 440px">
                    Depicts the legendary Seven Sisters cliffs and Coastguard Cottages. Professionally printed on
                    heavyweight 265gsm satin-finish paper for exceptional colour accuracy.
                </p>
                <div style="display: flex; align-items: center; gap: 14px; margin-top: 24px">
                    <span style="font: var(--font-price); color: var(--price)">From £{{ featured.price }}</span>
                    <ModaBadge v-if="featured.inStock" tone="success">In stock</ModaBadge>
                    <ModaBadge v-else tone="neutral">Sold out</ModaBadge>
                </div>
                <div style="margin-top: 22px">
                    <ModaButton variant="primary" size="lg" as="a" :href="amazonUrl" target="_blank">
                        <template #icon>
                            <svg
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M15 3h6v6" />
                                <path d="M10 14 21 3" />
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                            </svg>
                        </template>
                        Buy poster here £{{ featured.price }}
                    </ModaButton>
                </div>
            </div>
        </section>

        <!-- Category links / CTAs -->
        <section id="about" style="max-width: var(--content-max); margin: 0 auto; padding: 40px 28px 8px">
            <div style="display: flex; align-items: baseline; justify-content: space-between; flex-wrap: wrap; gap: 12px">
                <h2 style="font: var(--font-h2); color: var(--text-primary); margin: 0">Shop by region</h2>
                <a
                    href="#collection"
                    style="
                        font: var(--font-body-sm);
                        color: var(--it-green);
                        font-weight: var(--weight-semibold);
                        text-decoration: none;
                    "
                    >View all posters →</a
                >
            </div>
            <div class="moda-category-grid">
                <a
                    v-for="cat in categories"
                    :key="cat.name"
                    href="#collection"
                    class="moda-category-card"
                >
                    <div style="font-size: 28px">{{ cat.emoji }}</div>
                    <div
                        style="
                            font: var(--font-h3);
                            color: var(--text-primary);
                            margin-top: 10px;
                            text-transform: uppercase;
                        "
                    >
                        {{ cat.name }}
                    </div>
                    <div style="font: var(--font-body-sm); color: var(--text-secondary); margin-top: 4px">
                        {{ cat.description }}
                    </div>
                    <div
                        style="
                            margin-top: 14px;
                            font-size: var(--text-xs);
                            font-weight: var(--weight-semibold);
                            color: var(--it-green);
                            letter-spacing: 0.04em;
                        "
                    >
                        {{ cat.count }} POSTERS →
                    </div>
                </a>
            </div>
        </section>

        <!-- Listings grid -->
        <section id="collection" style="max-width: var(--content-max); margin: 0 auto; padding: 56px 28px 72px">
            <div style="text-align: center; margin-bottom: 8px">
                <div style="font: var(--font-eyebrow); color: var(--it-green); letter-spacing: 0.14em">
                    THE COLLECTION
                </div>
                <h2 style="font: var(--font-h2); color: var(--text-primary); margin: 10px 0 0">
                    Premium British Travel Posters
                </h2>
                <p
                    style="
                        font: var(--font-body-md);
                        color: var(--text-secondary);
                        margin: 12px auto 0;
                        max-width: 560px;
                    "
                >
                    Each print is professionally produced on 265gsm satin paper and available in A4, A3, and A2.
                </p>
            </div>
            <div class="moda-listings-grid">
                <ModaProductCard
                    v-for="item in listings"
                    :key="item.id"
                    :title="item.title"
                    :place="item.place"
                    :price="item.price"
                    :original-price="item.originalPrice"
                    :size="item.size"
                    :in-stock="item.inStock"
                    :href="amazonUrl"
                />
            </div>
        </section>

        <!-- Why Moda Italia -->
        <section style="background: var(--surface-sunken); padding: 72px 28px">
            <div style="max-width: var(--content-max); margin: 0 auto">
                <h2 style="font: var(--font-h2); color: var(--text-primary); text-align: center; margin: 0 0 40px">
                    Why Moda Italia
                </h2>
                <div class="moda-benefit-grid">
                    <div
                        v-for="[emoji, title, body] in benefits"
                        :key="title"
                        style="
                            background: var(--surface-card);
                            border: 1px solid var(--border-subtle);
                            border-radius: var(--radius-md);
                            box-shadow: var(--shadow-card);
                            padding: 24px;
                        "
                    >
                        <div style="font-size: 26px">{{ emoji }}</div>
                        <div
                            style="
                                font: var(--font-eyebrow);
                                letter-spacing: 0.04em;
                                margin-top: 12px;
                                color: var(--text-primary);
                            "
                        >
                            {{ title }}
                        </div>
                        <div style="font: var(--font-body-sm); color: var(--text-secondary); margin-top: 8px">
                            {{ body }}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter -->
        <section id="contact" style="background: var(--ink-950); padding: 64px 28px; text-align: center">
            <div style="max-width: 480px; margin: 0 auto">
                <h3 style="font: var(--font-h3); color: var(--paper-0); margin: 0">Get first look at new views</h3>
                <p style="font: var(--font-body-sm); color: var(--text-on-inverse-muted); margin-top: 8px">
                    New landscapes, gift ideas, and the occasional sconto — straight to your inbox.
                </p>
                <div
                    v-if="subscribed"
                    style="
                        margin-top: 20px;
                        color: var(--it-green);
                        font-size: var(--text-sm);
                        font-weight: var(--weight-semibold);
                    "
                >
                    🎉 You're on the list — grazie!
                </div>
                <form v-else style="display: flex; gap: 10px; margin-top: 22px" @submit.prevent="subscribe">
                    <input
                        v-model="email"
                        type="email"
                        required
                        placeholder="you@example.com"
                        style="
                            flex: 1;
                            padding: 12px 14px;
                            border-radius: var(--radius-md);
                            border: 1px solid rgba(255, 255, 255, 0.2);
                            background: rgba(255, 255, 255, 0.06);
                            color: var(--paper-0);
                            font-family: var(--font-body);
                            font-size: var(--text-sm);
                            outline: none;
                        "
                    />
                    <ModaButton variant="secondary" type="submit">Subscribe</ModaButton>
                </form>
            </div>
        </section>

        <ModaFooter />
    </div>
</template>

<style scoped>
.moda-featured {
    max-width: var(--content-max);
    margin: 0 auto;
    padding: 72px 28px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    align-items: center;
}

.moda-category-grid {
    margin-top: 24px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
}

.moda-category-card {
    display: block;
    text-decoration: none;
    background: var(--surface-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-card);
    padding: 24px;
    transition:
        box-shadow var(--duration-base) var(--ease-standard),
        transform var(--duration-base) var(--ease-standard);
}

.moda-category-card:hover {
    box-shadow: var(--shadow-raised);
    transform: translateY(-2px);
}

.moda-listings-grid {
    margin-top: 40px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

.moda-benefit-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

@media (max-width: 1000px) {
    .moda-category-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .moda-listings-grid {
        grid-template-columns: repeat(3, 1fr);
    }
    .moda-benefit-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 720px) {
    .moda-featured {
        grid-template-columns: 1fr;
        padding: 48px 24px;
    }
    .moda-listings-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .moda-benefit-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 460px) {
    .moda-category-grid,
    .moda-listings-grid {
        grid-template-columns: 1fr;
    }
}
</style>
