@extends('Fondo')

<div class="window-xp">
    <div class="title-bar">
        <div class="title-bar-text">Panel de control</div>
        <div class="title-bar-controls">
            <button aria-label="Close"></button>
        </div>
    </div>

    <div class="window-body">
        <section class="config-section">
            <h2 class="section-title">Fondo de escritorio</h2>
            <div class="grid-container">
                <div class="item-card active">
                    <div class="image-placeholder bg-bliss"></div>
                    <div class="status-label">Actual</div>
                </div>
                <div class="item-card">
                    <div class="image-placeholder bg-vista"></div>
                </div>
                <div class="item-card">
                    <div class="image-placeholder bg-tux"></div>
                </div>
            </div>
        </section>

        <section class="config-section">
            <h2 class="section-title">Avatar</h2>
            <div class="grid-container-small">
                <div class="item-card-small">
                    <div class="avatar-placeholder msn-logo"></div>
                </div>
                <div class="item-card-small active">
                    <div class="avatar-placeholder duck-logo"></div>
                    <div class="status-label">Actual</div>
                </div>
            </div>
        </section>

        <footer class="window-footer">
            <div class="storage-info">
                <span>Uso de disco</span>
                <div class="progress-container">
                    <div class="progress-bar" style="width: 80%;">80 %</div>
                </div>
            </div>
        </footer>
    </div>
</div>

<style>
    .window-xp {
        width: 850px;
        margin: 20px auto;
        background-color: #ECE9D8;
        border: 3px solid #0055E5;
        border-radius: 8px 8px 0 0;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
        font-family: "Tahoma", sans-serif;
    }

    .title-bar {
        background: linear-gradient(to bottom, #0058e6 0%, #3a89fb 10%, #2976fd 34%, #0058e6 100%);
        padding: 4px 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        font-weight: bold;
        text-shadow: 1px 1px #000;
        border-radius: 5px 5px 0 0;
    }

    .title-bar-controls button {
        width: 21px;
        height: 21px;
        background-color: #E81123;
        border: 1px solid #FFF;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }

    .title-bar-controls button::before {
        content: "X";
    }

    .window-body {
        padding: 20px;
    }

    .section-title {
        font-size: 1.1em;
        color: #333;
        margin-bottom: 15px;
        border-bottom: 1px solid #ADC6E5;
        padding-bottom: 5px;
    }

    .grid-container {
        display: flex;
        gap: 15px;
        margin-bottom: 30px;
    }

    .item-card {
        border: 1px solid #919B9C;
        background: white;
        padding: 4px;
        width: 180px;
    }

    .item-card.active {
        border: 2px solid #0055E5;
        padding: 3px;
    }

    .image-placeholder {
        width: 100%;
        height: 100px;
        background-color: #ddd;
        background-size: cover;
    }

    .status-label {
        background-color: #C02A2A;
        color: white;
        text-align: center;
        font-size: 0.85em;
        padding: 4px 0;
        margin-top: 4px;
    }

    .grid-container-small {
        display: flex;
        gap: 20px;
    }

    .item-card-small {
        width: 80px;
        border: 1px solid #919B9C;
        background: white;
        padding: 3px;
    }

    .item-card-small.active {
        border: 2px solid #0055E5;
        padding: 2px;
    }

    .avatar-placeholder {
        width: 100%;
        height: 70px;
        background-color: #eee;
    }

    .window-footer {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .storage-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .progress-container {
        width: 200px;
        height: 25px;
        background: #eee;
        border: 1px solid #848484;
    }

    .progress-bar {
        height: 100%;
        background-color: #FF9D3C;
        text-align: center;
        line-height: 25px;
        font-size: 0.9em;
        font-weight: bold;
    }

    .bg-bliss {
        background-color: #4A7729;
    }

    .bg-vista {
        background-color: #1a5c5c;
    }

    .bg-tux {
        background-color: #000;
    }
</style>