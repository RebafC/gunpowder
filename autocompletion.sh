# Gunpowder bash autocompletion
_gunpowder ()
{
    local cur

    COMPREPLY=()
    cur=${COMP_WORDS[COMP_CWORD]}
    
    files=`ls ~/.gunpowder/ | sed 's/.php//'`
    COMPREPLY=($( compgen -W "${files}" -- $cur ));

    return 0
}

complete -F _gunpowder -o filenames gunpowder
