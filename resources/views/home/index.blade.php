@extends('Layouts.app')

@section('content')
<div style="font-family: 'Figtree', sans-serif;">

    {{-- HERO --}}
    <div style="background: linear-gradient(135deg, #1b4332, #2d6a4f); color: white; text-align: center; padding: 5rem 2rem;">
        <h1 style="font-size: 3rem; font-weight: bold; margin-bottom: 1rem;">🌿 Grow & Bloom</h1>
        <p style="font-size: 1.2rem; color: #b7e4c7; margin-bottom: 2rem;">Bring nature into your home</p>
        <a href="{{ route('plant.index') }}" style="background: #74c69d; color: #1b4332; padding: 0.9rem 2.5rem; border-radius: 30px; text-decoration: none; font-weight: bold; font-size: 1rem;">
            Shop Now →
        </a>
    </div>

    {{-- PLANTAS --}}
    <div style="max-width: 1100px; margin: 3rem auto; padding: 0 1.5rem;">
        <h2 style="color: #1b4332; font-size: 1.8rem; margin-bottom: 1.5rem; text-align: center;">Our Plants</h2>

        @if(session('success'))
            <div style="background:#d8f3dc; color:#1b4332; padding:0.9rem; border-left:4px solid #40916c; border-radius:4px; margin-bottom:1.5rem;">
                 {{ session('success') }}
            </div>
        @endif

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 1.5rem;">
            @foreach($viewData['plants'] as $plant)
                <div style="background: white; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); overflow: hidden;">

                    {{-- Imagen --}}
                    <div style="height: 180px; background: #d8f3dc; display: flex; align-items: center; justify-content: center; font-size: 4rem;">
                        
                    </div>

                    {{-- Info --}}
                    <div style="padding: 1.2rem;">
                        <h3 style="color: #1b4332; font-size: 1.1rem; font-weight: bold; margin-bottom: 0.3rem;">
                            {{ $plant->getName() }}
                        </h3>
                        <p style="color: #666; font-size: 0.9rem; margin-bottom: 0.3rem;">🌿 {{ $plant->getType() }}</p>
                        <p style="color: #666; font-size: 0.85rem; margin-bottom: 0.8rem;">⚠️ {{ $plant->getCaution() }}</p>
                        <div style="font-size: 1.4rem; font-weight: bold; color: #2d6a4f; margin-bottom: 1rem;">
                            ${{ $plant->getPrice() }}
                        </div>

                        {{-- Botones --}}
                        <div style="display: flex; gap: 0.5rem;">
                            <a href="{{ route('plant.show', $plant->getId()) }}"
                               style="flex:1; text-align:center; padding: 0.6rem; background: #d8f3dc; color: #1b4332; border-radius: 8px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">
                                View
                            </a>
                            <form action="{{ route('cart.add', $plant->getId()) }}" method="POST" style="flex:1;">
                                @csrf
                                <button type="submit"
                                    style="width:100%; padding: 0.6rem; background: #1b4332; color: white; border-radius: 8px; border:none; font-size: 0.9rem; font-weight: 600; cursor:pointer;">
                                    🛒 Add
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

    {{-- FOOTER --}}
    <footer style="background: #1b4332; color: #b7e4c7; text-align: center; padding: 2rem; margin-top: 3rem;">
        <p> Grow & Bloom © {{ date('Y') }} — All rights reserved</p>
    </footer>

</div>
@endsection