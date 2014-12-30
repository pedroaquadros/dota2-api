<?php

namespace Dota2Api\Mappers;

/**
 * Common part for matches mapper (like properties and their getters, setters)
 */
abstract class MatchesMapper
{
    /**
     * Search matches with a player name, exact match only
     * @var string
     */
    protected $_player_name;
    /**
     * Search for matches with a specific hero being played (hero ID, not name)
     * @var int
     */
    protected $_hero_id;
    /**
     * 0 for any, 1 for normal, 2 for high, 3 for very high skill (default is 0)
     * @var int
     */
    protected $_skill;
    /**
     * date in UTC seconds since Jan 1, 1970 (unix time format)
     * @var int
     */
    protected $_date_min;
    /**
     * date in UTC seconds since Jan 1, 1970 (unix time format)
     * @var int
     */
    protected $_date_max;
    /**
     * A user's 32-bit steam ID
     * @var int
     */
    protected $_account_id;
    /**
     * matches for a particular league
     * @var int
     */
    protected $_league_id;
    /**
     * Start the search at the indicated match id, descending
     * @var int
     */
    protected $_start_at_match_id;
    /**
     * Maximum is 25 matches (default is 25)
     * @var int
     */
    protected $_matches_requested;

    /**
     * set to only show tournament games
     * @var string
     */
    protected $_tournament_games_only;

    /**
     * @param string $name
     * @return MatchesMapper
     */
    public function setPlayerMame($name)
    {
        $this->_player_name = (string)$name;
        return $this;
    }

    /**
     * @return string | null
     */
    public function getPlayerName()
    {
        return $this->_player_name;
    }

    /**
     * @param int $heroId
     * @return MatchesMapper
     */
    public function setHeroId($heroId)
    {
        $this->_hero_id = intval($heroId);
        return $this;
    }

    /**
     * @return int
     */
    public function getHeroId()
    {
        return $this->_hero_id;
    }

    /**
     * @param int $skill
     * @return MatchesMapper
     */
    public function setSkill($skill)
    {
        $skill = intval($skill);
        if ($skill >= 0 && $skill <= 3) {
            $this->_skill = $skill;
        }
        return $this;
    }

    /**
     * @return int
     */
    public function getSkill()
    {
        return $this->_skill;
    }

    /**
     * @param int $timestamp
     * @return MatchesMapper
     */
    public function setDateMax($timestamp)
    {
        $timestamp = intval($timestamp);
        if ($timestamp >= 0 && $timestamp < 2147483647) {
            $this->_date_max = $timestamp;
        }
        return $this;
    }

    /**
     * @return int
     */
    public function getDateMax()
    {
        return $this->_date_max;
    }

    /**
     * @param int $timestamp
     * @return MatchesMapper
     */
    public function setDateMin($timestamp)
    {
        $timestamp = intval($timestamp);
        if ($timestamp >= 0 && $timestamp < 2147483647) {
            $this->_date_min = $timestamp;
        }
        return $this;
    }

    /**
     * @return int
     */
    public function getDateMin()
    {
        return $this->_date_min;
    }

    /**
     * @param int $accountId
     * @return MatchesMapper
     */
    public function setAccountId($accountId)
    {
        $this->_account_id = intval($accountId);
        return $this;
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
        return $this->_account_id;
    }

    /**
     * @param int $leagueId
     * @return MatchesMapper
     */
    public function setLeagueId($leagueId)
    {
        $this->_league_id = intval($leagueId);
        return $this;
    }

    /**
     * @return int
     */
    public function getLeagueId()
    {
        return $this->_league_id;
    }

    /**
     * @param int $matchId
     * @return MatchesMapper
     */
    public function setStartAtMatchId($matchId)
    {
        $this->_start_at_match_id = intval($matchId);
        return $this;
    }

    /**
     * @return int
     */
    public function getStartAtMatchId()
    {
        return $this->_start_at_match_id;
    }

    /**
     * @param int $matchesRequested
     * @return MatchesMapper
     */
    public function setMatchesRequested($matchesRequested)
    {
        $matchesRequested = intval($matchesRequested);
        if ($matchesRequested > 0 && $matchesRequested <= 100) {
            $this->_matches_requested = $matchesRequested;
        }
        return $this;
    }

    /**
     * @return int
     */
    public function getMatchesRequested()
    {
        return $this->_matches_requested;
    }

    /**
     * @param string $tournamentGamesOnly
     * @return MatchesMapper
     */
    public function setTournamentGamesOnly($tournamentGamesOnly)
    {
        $tournamentGamesOnly = ($tournamentGamesOnly === true) ? 'true' : 'false';
        $this->_tournament_games_only = $tournamentGamesOnly;
        return $this;
    }

    /**
     * @return string
     */
    public function getTournamentGamesOnly()
    {
        return $this->_tournament_games_only;
    }
}
