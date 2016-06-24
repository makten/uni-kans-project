<?php
/**
 * Created by PhpStorm.
 * User: Hafiz
 * Date: 6/20/2016
 * Time: 12:32 PM
 */

namespace app;


use Illuminate\Support\Facades\Auth;
use App\CanJoinTeams;


class StartApp
{
    /**
     * The default role that is assigned to new team members.
     *
     * @var string
     */
    protected static $defaultRole;
    /**
     * The team roles that may be assigned to users.
     *
     * @var array
     */
    protected static $roles = [];

    /**
     * The callback used to retrieve the users.
     *
     * @var callable|null
     */
    public static $retrieveUsersWith;

    /**
     * The callback used to create the new users.
     *
     * @var callable|null
     */
    public static $createUsersWith;


    /**
     * The callback used to retrieve the user profile validator.
     *
     * @var callable|null
     */
    public static $validateProfileUpdatesWith;
    /**
     * The callback used to update the user's profiles.
     *
     * @var callable|null
     */
    public static $updateProfilesWith;
    /**
     * The callback used to retrieve the new team validator.
     *
     * @var callable|null
     */
    public static $validateNewTeamsWith;
    /**
     * The callback used to retrieve the team validator.
     *
     * @var callable|null
     */
    public static $validateTeamUpdatesWith;
    /**
     * The callback used to update teams.
     *
     * @var callable|null
     */
    public static $updateTeamsWith;
    /**
     * The callback used to retrieve the team member validator.
     *
     * @var callable|null
     */
    public static $validateTeamMemberUpdatesWith;
    /**
     * The callback used to update a team member.
     *
     * @var callable|null
     */
    public static $updateTeamMembersWith;

    /**
     * Indicates if the application is supporting teams.
     *
     * @var bool
     */
    protected static $usingTeams;
    /**
     * The Spark configuration options.
     *
     * @var array
     */
    protected static $options = [];
    /**
     * Configure the application.
     *
     * @param  array  $options
     * @return void
     */
    public static function configure(array $options)
    {
        static::$options = $options;
    }
    /**
     * Get a configuration option.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public static function option($key, $default)
    {
        return array_get(static::$options, $key, $default);
    }
    /**
     * Get the class name for a given model.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public static function model($key, $default = null)
    {
        return array_get(static::$options, 'models.'.$key, $default);
    }
    /**
     * Get or define the default role for team members.
     *
     * @param  string|null  $role
     * @return string|void
     */
    public static function defaultRole($role = null)
    {
        if (is_null($role)) {
            return static::$defaultRole;
        } else {
            static::$defaultRole = $role;
        }
    }
    /**
     * Get or define the team roles that can be assigned to a user.
     *
     * @param  array|null  $roles
     * @return array|void
     */
    public static function roles(array $roles = null)
    {
        if (is_null($roles)) {
            return array_merge(static::$roles, ['owner' => 'Owner']);
        } else {
            static::$roles = $roles;
        }
    }


    /**
     * Retrieve the current user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public static function user()
    {
        return static::$retrieveUsersWith
            ? call_user_func(static::$retrieveUsersWith)
            : Auth::user();
    }
    /**
     * Set a callback to be used to retrieve the user.
     *
     * @param  callable  $callback
     * @return void
     */
    public static function retrieveUsersWith(callable $callback)
    {
        static::$retrieveUsersWith = $callback;
    }
    /**
     * Determine if the Spark application supports teams.
     *
     * @return bool
     */
    public static function usingTeams()
    {
        if (! is_null(static::$usingTeams)) {
            return static::$usingTeams;
        } else {
            return static::$usingTeams = in_array(
                CanJoinTeams::class, class_uses_recursive(config('auth.providers.users.model'))
            );
        }
    }


    /**
     * Set a callback to be used to retrieve the new team validator.
     *
     * @param  callable|string  $callback
     * @return void
     */
    public static function validateNewTeamsWith($callback)
    {
        static::$validateNewTeamsWith = $callback;
    }
    /**
     * Set a callback to be used to retrieve the team update validator.
     *
     * @param  callable|string  $callback
     * @return void
     */
    public static function validateTeamUpdatesWith($callback)
    {
        static::$validateTeamUpdatesWith = $callback;
    }
    /**
     * Set a callback to be used to update teams.
     *
     * @param  callable|string  $callback
     * @return void
     */
    public static function updateTeamsWith($callback)
    {
        static::$updateTeamsWith = $callback;
    }
    /**
     * Set a callback to be used to retrieve the team member update validator.
     *
     * @param  callable|string  $callback
     * @return void
     */
    public static function validateTeamMemberUpdatesWith($callback)
    {
        static::$validateTeamMemberUpdatesWith = $callback;
    }
    /**
     * Set a callback to be used to update team members.
     *
     * @param  callable|string  $callback
     * @return void
     */
    public static function updateTeamMembersWith($callback)
    {
        static::$updateTeamMembersWith = $callback;
    }



}
