@php
    // Original logic reused
    $user = filament()->auth()->user();
    $items = filament()->getUserMenuItems();

    $profileItem = $items['profile'] ?? ($items['account'] ?? null);
    $profileItemUrl = $profileItem?->getUrl();
    $profilePage = filament()->getProfilePage();
    $hasProfileItem = filament()->hasProfile() || filled($profileItemUrl);
    $logoutItem = $items['logout'] ?? null;

    // Remove default keys so they don't show twice (we handle them manually below)
$items = \Illuminate\Support\Arr::except($items, ['account', 'logout', 'profile']);

$megaMenuColumns = \Kiconta\FilamentTheme\Support\MenuUtils::getMenuItems();

@endphp

{{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::USER_MENU_BEFORE) }}

<x-filament::dropdown placement="bottom-end" teleport :attributes="\Filament\Support\prepare_inherited_attributes($attributes)->class([
    'fi-user-menu',
    'fi-user-menu-mega',
    '!max-w-[800px]',
])">
    <x-slot name="trigger">
        <button aria-label="{{ __('filament-panels::layout.actions.open_user_menu.label') }}" type="button"
            class="shrink-0 focus:outline-none">
            <x-filament-panels::avatar.user :user="$user" />
        </button>
    </x-slot>

    <div class="p-4 !w-[880px] max-w-full">
        {{-- Profile header (optional) --}}
        @if ($profileItem?->isVisible() ?? true)
            <div class="flex items-center gap-3 mb-4">
                <x-filament-panels::avatar.user :user="$user" class="w-10 h-10" />
                <div class="min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-100">
                        {{ filament()->getUserName($user) }}
                    </p>
                    @if ($profileItemUrl)
                        <a href="{{ $profileItemUrl }}"
                            class="text-xs text-primary-600 hover:underline dark:text-primary-400">
                            {{ $profileItem?->getLabel() ?? (($profilePage ? $profilePage::getLabel() : null) ?? __('filament-panels::layout.actions.edit_profile.label')) }}
                        </a>
                    @endif
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            @foreach ($megaMenuColumns as $title => $links)
                <div>
                    <h4 class="mb-3 text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $title }}</h4>
                    <ul class="space-y-2">
                        @foreach ($links as $link)
                            <li>
                                <a href="{{ $link['url'] }}"
                                    class="group flex items-start gap-2 rounded px-2 py-1.5 text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-gray-900 dark:hover:text-white transition">
                                    @if (!empty($link['icon']))
                                        <x-filament::icon :icon="$link['icon']"
                                            class="w-4 h-4 text-gray-400 group-hover:text-primary-600 dark:group-hover:text-primary-400" />
                                    @endif
                                    <span>{{ $link['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        {{-- Extra custom user menu items registered via ->userMenuItems() (excluding profile & logout) --}}
        @if (count($items))
            <div class="grid grid-cols-2 gap-2 pt-4 mt-6 border-t border-gray-200 dark:border-gray-700">
                @foreach ($items as $key => $item)
                    @php $itemPostAction = $item->getPostAction(); @endphp
                    @if (filled($itemPostAction))
                        <form method="post" action="{{ $itemPostAction }}" class="col-span-1">
                            @csrf
                            <button type="submit"
                                class="flex items-center w-full gap-2 px-3 py-2 text-sm text-left rounded hover:bg-gray-50 dark:hover:bg-gray-800">
                                @if ($item->getIcon())
                                    <x-filament::icon :icon="$item->getIcon()" class="w-4 h-4 text-gray-400" />
                                @endif
                                {{ $item->getLabel() }}
                            </button>
                        </form>
                    @else
                        <a href="{{ $item->getUrl() }}" @if ($item->shouldOpenUrlInNewTab()) target="_blank" @endif
                            class="flex items-center gap-2 px-3 py-2 text-sm rounded hover:bg-gray-50 dark:hover:bg-gray-800">
                            @if ($item->getIcon())
                                <x-filament::icon :icon="$item->getIcon()" class="w-4 h-4 text-gray-400" />
                            @endif
                            {{ $item->getLabel() }}
                        </a>
                    @endif
                @endforeach
            </div>
        @endif

        <div class="flex items-center justify-between pt-4 mt-6 border-t border-gray-200 dark:border-gray-700">
            <form method="post" action="{{ $logoutItem?->getUrl() ?? filament()->getLogoutUrl() }}">
                @csrf
                <button type="submit"
                    class="flex items-center gap-2 text-sm font-medium text-danger-600 hover:underline dark:text-danger-400">
                    <x-filament::icon :icon="$logoutItem?->getIcon() ??
                        (\Filament\Support\Facades\FilamentIcon::resolve('panels::user-menu.logout-button') ??
                            'heroicon-m-arrow-left-on-rectangle')" class="w-4 h-4" />
                    {{ $logoutItem?->getLabel() ?? __('filament-panels::layout.actions.logout.label') }}
                </button>
            </form>
        </div>
    </div>
</x-filament::dropdown>

{{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::USER_MENU_AFTER) }}
