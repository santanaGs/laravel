app.post("/agendamento", async (req, res) => {
    const { medicoId, pacienteId, data } = req.body;
    const dataAgendamento = new Date(data);
    const horaAgendamento = dataAgendamento.getHours();

    if (
        horaAgendamento < horarioFuncionamento.inicio ||
        horaAgendamento >= horarioFuncionamento.fim
    ) {
        return res
            .status(400)
            .json({ erro: "Horário fora do funcionamento da clínica" });
    }

    const medico = await Medico.findByPk(medicoId);
    if (!medico) {
        return res.status(404).json({ erro: "Médico não encontrado" });
    }

    const paciente = await Paciente.findByPk(pacienteId);
    if (!paciente) {
        return res.status(404).json({ erro: "Paciente não encontrado" });
    }

    const agendamentoMedico = await Agendamento.findOne({
        where: {
            medicoId,
            data: dataAgendamento,
        },
    });

    if (agendamentoMedico) {
        return res
            .status(400)
            .json({ erro: "O médico não está disponível neste horário" });
    }

    const agendamentoPaciente = await Agendamento.findOne({
        where: {
            pacienteId,
            data: dataAgendamento,
        },
    });

    if (agendamentoPaciente) {
        return res
            .status(400)
            .json({ erro: "O paciente já tem um agendamento neste horário" });
    }

    const agendamento = await Agendamento.create({
        medicoId,
        pacienteId,
        data: dataAgendamento,
    });
    res.status(201).json(agendamento);
});
