package nl.grapjeje.utils.listener;

import nl.grapjeje.listeners.PlayerLoginListener;

public class ListenManager {

    public void init() {
        // Main
        new PlayerLoginListener().register();;
    }
}
