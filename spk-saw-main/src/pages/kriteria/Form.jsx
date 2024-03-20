/** @format */

import { useForm } from "react-hook-form";
import Modal from "../../components/modal/Modal";
import useKriteria from "../../store/kriteria";
import { v1 as uuidv1 } from "uuid";
import { useEffect } from "react";

const Form = ({ showModal, setShowModal, dtEdit, setDtEdit }) => {
  // @ts-ignore
  // store
  const { addData, updateData } = useKriteria();
  // react hook form
  const {
    register,
    handleSubmit,
    watch,
    setValue,
    formState: { errors },
  } = useForm();
  // reset form
  const resetForm = () => {
    setValue("id", uuidv1());
    setValue("nama", "");
    setValue("jenis", "");
  };
  // effect
  useEffect(() => {
    if (dtEdit) {
      setValue("id", dtEdit?.id);
      setValue("nama", dtEdit?.nama);
      setValue("jenis", dtEdit?.jenis);
      return;
    }
    resetForm();

    return () => {};
  }, [showModal, dtEdit]);

  // simpan data
  const onSubmit = async (data) => {
    if (dtEdit) {
      await updateData(data.id, data);
      setShowModal(false);
      return;
    }
    await addData(data);
    resetForm();
  };

  return (
    <Modal>
      {/* form */}
      <form onSubmit={handleSubmit(onSubmit)} className="flex flex-col gap-4">
        <div className="grid md:grid-cols-2 md:gap-2">
          <input
            type="hidden"
            id="id"
            className="input input-bordered"
            {...register("id", { required: true })}
          />
          <div className="form-control">
            <label className="label" htmlFor="nama">
              <span className="label-text">Nama Kriteria</span>
            </label>
            <input
              type="text"
              id="nama"
              placeholder="Masukan nama"
              className="input input-bordered"
              {...register("nama", { required: true })}
            />
            {errors.nama && (
              <span className="text-error text-sm">Tidak boleh kosong</span>
            )}
          </div>
          <div className="form-control">
            <label className="label" htmlFor="jenis">
              <span className="label-text">Jenis Kriteria</span>
            </label>
            <select
              id="jenis"
              className="select select-bordered w-full"
              defaultValue=""
              {...register("jenis", { required: true })}
            >
              <option value="">Pilih Jenis</option>
              <option value="cost">Cost</option>
              <option value="benefit">Benefit</option>
            </select>
            {errors.jenis && (
              <span className="text-error text-sm">Tidak boleh kosong</span>
            )}
          </div>
        </div>
        <div className="">
          <button className="btn btn-secondary" type="submit">
            Simpan data
          </button>
        </div>
      </form>
    </Modal>
  );
};

export default Form;
