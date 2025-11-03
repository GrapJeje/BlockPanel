package nl.grapjeje.listeners;

import net.minestom.server.coordinate.Pos;
import net.minestom.server.entity.GameMode;
import net.minestom.server.entity.Player;
import net.minestom.server.event.player.AsyncPlayerConfigurationEvent;
import net.minestom.server.event.player.PlayerSpawnEvent;
import nl.grapjeje.Main;
import nl.grapjeje.utils.listener.Listen;
import nl.grapjeje.utils.listener.Listener;

public class PlayerLoginListener implements Listener {

    @Listen
    public void onPlayerLogin(AsyncPlayerConfigurationEvent e) {
        final Player player = e.getPlayer();

        e.setSpawningInstance(Main.getInstanceContainer());
        player.setGameMode(GameMode.CREATIVE);
    }

    @Listen
    public void onPlayerSpawn(PlayerSpawnEvent e) {
        final Player player = e.getPlayer();
        player.teleport(new Pos(0, 1, 0));
    }
}
